<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::paginate('5');
        return view('pages.dashboardTopicsIndex', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboardTopicsForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
                'title' => ['required', 'alpha', 'max:255'],
            ]
        );

        $topic = new Topic();
        $topic->title=$request->title;
        $res = $topic -> save();
        if($res){
            return redirect('admin/topics')->with('success', 'Topic is added succsfully');
        }
        else{
            return redirect('admin/topics')->with('fail', 'Topic is not added succsfully');

        }
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
        $topic = Topic::findOrFail($id);


        return view('pages.dashboardTopicsEdit',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::findOrFail($id);
        $request->validate([
                'title' => ['required', 'alpha', 'max:255'],

            ]
        );

        $topic->update(['title'=>$request->input('title')]);
        $topic->save();
        return redirect('/admin/topics')->with('success', 'Topic was succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $topic = Topicklaste::findOrFail($request->topic_delete_id);
        try {
            $topic->delete();
            return redirect('admin/topics')->with('success', 'Topic was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this topic');
        }
    }
}
