<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Theory;
use App\Models\Topic;


class theoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theories = Theory::all();
        $topics = Topic::all();
        return view('pages.theory', compact('theories','topics'));
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
        $theory = Theory::findOrFail($id);
        $theory->viewedTime = now();
        $theory->save();
        return view('pages.theoryShow', compact('theory'));
    }
    public function filterTheoryById(string $id)
    {
        $topic = Topic::findOrFail($id);
         $theoryFilteredByTopic = DB::table('theory')
             ->select('*')
             ->where('topic_id',$topic->id)
             ->get();


        return view('pages.filteredByTopic', compact('topic','theoryFilteredByTopic'));
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
