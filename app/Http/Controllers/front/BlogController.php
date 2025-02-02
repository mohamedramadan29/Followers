<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\admin\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status',1)->orderBy('id','desc')->paginate(10);
        return view('front.blog.blog',compact('blogs'));
    }
    public function show($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        $lastest_blogs = Blog::where('status',1)->where('id','!=',$blog->id)->orderBy('id','desc')->limit(3)->get();
        if(!$blog){
            abort(404);
        }
        return view('front.blog.blog_details',compact('blog','lastest_blogs'));
    }
}
