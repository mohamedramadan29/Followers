<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Faq;
use Illuminate\Http\Request;
use App\Models\admin\Product;
use App\Models\admin\MainCategory;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $bestservices = Product::where('best_services',1)->orderBy('id','desc')->limit(8)->get();
        $newservices = Product::where('newest_service',1)->orderBy('id','desc')->limit(8)->get();
        $categories = MainCategory::where('status',1)->get();
        $faqs = Faq::where('status',1)->get();
        return view("front.index",compact('bestservices','categories','newservices','faqs'));
    }
    public function category($slug){
        $category = MainCategory::with('subCategories','products')->where('slug', $slug)->first();
        return view("front.category",compact('category'));
    }
}
