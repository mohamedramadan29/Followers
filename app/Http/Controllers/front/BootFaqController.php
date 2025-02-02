<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Models\admin\BootFaq;
use App\Http\Controllers\Controller;

class BootFaqController extends Controller
{
    public function searchFaq(Request $request)
    {
        $query = $request->input('query');
        $faqs = BootFaq::where('question', 'like', '%' . $query . '%')->get();
        return response()->json($faqs);
    }
}
