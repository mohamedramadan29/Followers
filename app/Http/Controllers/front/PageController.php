<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page($slug){
        $page = Page::where('slug',$slug)->first();
        if(!$page){
            abort(404);
        }
        return view('front.page',compact('page'));
    }
}
