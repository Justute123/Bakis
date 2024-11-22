<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth; // Correct for Auth facade
use DB;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $results = Result::with('user','quiz')
        ->where('user_id', Auth::user()->id)
            ->get();

        return view('pages.solvedQuizesHistory', compact('results'));
    }
    public function sortedByTotal(Request $request)
    {
        $sortOption = $request->input('sortOption');
        if ($sortOption == 'total_desc') {
            $results = Result::with('user', 'quiz')
            ->where('user_id', Auth::user()->id)
                ->orderBy('total', 'desc')
                ->get();
            return view('pages.solvedQuizesHistory', compact('results'));
        }
        else if($sortOption == 'selection')
        {
            $results = Result::with('user','quiz')
            ->where('user_id', Auth::user()->id)
                ->get();

            return view('pages.solvedQuizesHistory', compact('results'));

        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
