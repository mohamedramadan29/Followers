<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Instagram\Api;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class InstagramCounterContoller extends Controller
{
    public function index()
    {
        return view('front.instagram-counter');
    }
    public function instagramCounter(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
        ]);

        $username = $request->input('username');

        $cache = new FilesystemAdapter();
        $api = new Api($cache);

        // تعيين User-Agent لمنع الحظر
        $api->setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36');
        try {
            // جلب بيانات الحساب
            $profile = $api->getProfile($username);

            // تحميل صورة الملف الشخصي
            $imageUrl = $profile->getProfilePicture();
            $imagePath = 'assets/uploads/Instagram_users/profile_' . $username . '.jpg';

            if ($this->downloadImage($imageUrl, public_path($imagePath))) {
                $imageUrl = asset($imagePath);
            }
            return view('front.instagram-counter', [
                'username' => $profile->getUserName(),
                'full_name' => $profile->getFullName(),
                'followers' => $profile->getFollowers(),
                'following' => $profile->getFollowing(),
                'profile_picture' => $imageUrl,
            ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'حدث خطأ أثناء جلب البيانات: ' . $e->getMessage());
        }
    }

    private function downloadImage($url, $savePath)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');

        $imageData = curl_exec($ch);
        curl_close($ch);

        if ($imageData !== false && !empty($imageData)) {
            file_put_contents($savePath, $imageData);
            return true;
        }
        return false;
    }
}
