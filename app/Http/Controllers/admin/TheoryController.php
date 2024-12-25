<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\studyProgramme;
use Illuminate\Http\Request;
use App\Models\Theory;
use App\Models\Topic;

class TheoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theories = Theory::paginate('5');
        return view('pages.dashboardTheoryIndex', compact('theories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = "";
        $topics = Topic::paginate('5');
        return view('pages.dashboardTheoryForm', compact('topics','result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'topic_id' => 'required|not_in:0',
                'image' => 'required',]
        );

        $theory= new Theory();
        $theory->title=$request->title;
        $theory->description=$request->description;
        $theory->topic_id=$request->topic_id;

        if($request->hasFile('image')){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $theory->image = 'images/'.$imageName;


        }


        $res = $theory -> save();
        if($res){
            return redirect('admin/theory')->with('success', 'Theory is added succsfully');
        }
        else{
            return redirect('admin/theory')->with('fail', 'Theory is not added succsfully');

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
        $topics = Topic::paginate('5');
        $theory = Theory::findOrFail($id);
        $result="";


        return view('pages.dashboardTheoryEdit',compact('topics','theory','result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'topic_id' => 'required|not_in:0',
                'image' => 'required']
        );



        $theory = Theory::findOrFail($id);


        if($request->hasFile('image')){

            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $theory->image = 'images/'.$imageName;

        }
        $theory->title = $request->title;
        $theory->description = $request->description;
        $theory->topic_id = $request->topic_id;

        $res = $theory->save();

        if($res){
            return redirect('admin/theory')->with('success', 'Theory is updated successfully');
        }
        else{
            return redirect('admin/theory')->with('fail', 'Theory is not updated successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $theory = Theory::findOrFail($request->theory_delete_id);
        try {
            $theory->delete();
            return redirect('admin/theory')->with('success', 'Theory was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this theory');
        }
    }
}
