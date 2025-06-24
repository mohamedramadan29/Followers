<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\front\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.users.favourite.index',compact('wishlist'));
    }
}
