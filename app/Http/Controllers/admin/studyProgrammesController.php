<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\studyProgramme;
use Illuminate\Http\Request;

class studyProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyProgrammes = studyProgramme::paginate('5');
        return view('pages.dashboardStudyProgrammesIndex', compact('studyProgrammes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboardStudyProgrammesForm');
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

        $studyProgramme = new studyProgramme();
        $studyProgramme->title=$request->title;
        $res = $studyProgramme -> save();
        if($res){
            return redirect('admin/studyProgrammes')->with('success', 'Study programme is added succsfully');
        }
        else{
            return redirect('admin/studyProgrammes')->with('fail', 'Study programme is not added succsfully');

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
        $studyProgramme = studyProgramme::findOrFail($id);


        return view('pages.dashboardstudyProgrammesEdit',compact('studyProgramme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $studyProgramme = studyProgramme::findOrFail($id);
        $request->validate([
                'title' => ['required', 'alpha', 'max:255'],

            ]
        );

        $studyProgramme->update(['title'=>$request->input('title')]);
        $studyProgramme->save();
        return redirect('/admin/studyProgrammes')->with('success', 'Study programme was succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $studyProgramme = studyProgramme::findOrFail($request->studyProgramme_delete_id);
        try {
            $studyProgramme->delete();
            return redirect('admin/studyProgrammes')->with('success', 'Study programme was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this study programme');
        }
    }
}
