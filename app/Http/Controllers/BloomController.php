<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Bloom;
use DB;

class BloomController extends Controller
{
    public function index()
    {

        $bloomCategories = Bloom::all();
        return view('pages/bloomCarts', compact('bloomCategories'));

    }
    public function filterQuizesByBloomId(string $id, Request $request)
    {
        $bloom = Bloom::findOrFail($id);


        $quizes =  Quiz::where('bloom_id',$bloom->id)
            ->with('topic')
            ->get();
        if ($quizes->isEmpty()) {
            return redirect()->back()->with('error', 'No quizes for this bloom category');
        }
       return view('pages.quiz', compact('quizes'));
    }
}
