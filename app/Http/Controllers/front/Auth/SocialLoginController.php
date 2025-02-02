<?php

namespace App\Http\Controllers\front\Auth;

use App\Models\front\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user_provider = Socialite::driver($provider)->user();
            $user_from_db = User::where('email', $user_provider->getEmail())->first();
            //dd($user);
            if ($user_from_db) {
                Auth::login($user_from_db);
                return redirect()->route(route: 'profile');
            }
            // $user_db = User::updateOrCreate([
            //     'email' => $user->email,
            //     //'google_id'=>$user->id,

            // ], [
            //     'name' => $user->name,
            //     'user_name' => Str::replace(' ', '', $user->name).time(),
            //     'email' => $user->email,
            //     'google_token' => $user->token,
            //     'password' => Hash::make(Str::random(8)),
            // ]);

           // $username = $this->generateuniqueusername($user_provider->name);
            $user = User::create([
                'name' => $user_provider->name,
               // 'user_name' => $username,
                'email' => $user_provider->email,
               // 'google_token' => $user_provider->token,
                'password' => Hash::make(Str::random(8)),
            ]);
            Auth::login($user);
            return redirect()->route('profile');
        } catch (\Exception $e) {
            return $e;
            //return redirect()->route('login');
        }
    }

    // public function generateuniqueusername($name){
    //     $username  = Str::slug($name);
    //     $count = 1;
    //     while(User::where('user_name',$username)->exists()){
    //         $username = $username . $count++;
    //     }
    //     return $username;
    // }
}
