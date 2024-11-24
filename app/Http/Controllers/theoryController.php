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
             ->paginate('6');


        return view('pages.filteredByTopic', compact('topic','theoryFilteredByTopic'));
    }

    public function search(Request $request, string $id)
    {
        $topic = Topic::findOrFail($id);
        $search = $request->input('search');
        $searchResults = Theory::where('topic_id',$topic->id)
            ->where('title', 'like', "%$search%")
            ->get();

        return view('pages.searchPage', compact('searchResults'));
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
