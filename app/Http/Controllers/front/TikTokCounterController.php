<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TikTokCounterController extends Controller
{
    public function index()
    {
        return view('front.tiktok-counter');
    }
    public function tiktokCounter(Request $request){
        $username = $request->input('username');
        return view('front.tiktok-counter',compact('username'));
    }
}
