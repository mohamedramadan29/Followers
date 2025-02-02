<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function terms(){
        $terms = Term::where('page_title', 'الشروط والاحكام')->first();
        return view('front.terms.terms',compact('terms'));
    }


    #################################################### ReturnPolicy ############################
    public function ReturnPolicy(Request $request)
    {
        $terms = Term::where('page_title', 'سياسة الاستبدال و الاسترجاع')->first();


        return view('front.terms.return', compact('terms'));
    }

    ############################################### Privacy Policy ######################

    public function PrivacyPolicy(Request $request)
    {
        $terms = Term::where('page_title', 'سياسة الاستخدام والخصوصية')->first();

        return view('front.terms.privacy', compact('terms'));
    }
}
