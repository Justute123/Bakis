<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::paginate('5');
        return view('pages.dashboardOptionsIndex', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions= Question::paginate('5');
        return view('pages.dashboardOptionsForm', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'option_text' => 'required|string|max:255',
                'point' => 'required|numeric|max:255',
                'order' => 'required|numeric|max:255',
                'question_id' => 'required|not_in:0',
                'isCorrect' => 'required',]
        );

        $option= new Option();
        $option->option_text=$request->option_text;
        $option->point=$request->point;
        $option->order=$request->order;
        $option->question_id=$request->question_id;
        $option->isCorrect=$request->isCorrect;


        $res = $option -> save();
        if($res){
            return redirect('admin/options')->with('success', 'Option is added succsfully');
        }
        else{
            return redirect('admin/options')->with('fail', 'Option is not added succsfully');

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
        $option= Option::findOrFail($id);
        $questions = Question::paginate('5');



        return view('pages.dashboardOptionsEdit',compact('option','questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'option_text' => 'required|string|max:255',
                'point' => 'required|numeric|max:255',
                'order' => 'required|numeric|max:255',
                'question_id' => 'required|not_in:0',
                'isCorrect' => 'required',]
        );

        $option= new Option();
        $option->option_text=$request->option_text;
        $option->point=$request->point;
        $option->order=$request->order;
        $option->question_id=$request->question_id;
        $option->isCorrect=$request->isCorrect;

        $option->update($request->all());
        $res = $option -> save();
        if($res){
            return redirect('admin/options')->with('success', 'Option is updated succsfully');
        }
        else{
            return redirect('admin/options')->with('fail', 'Option is not updated succsfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $option = Option::findOrFail($request->option_delete_id);
        try {
            $option->delete();
            return redirect('admin/options')->with('success', 'Option was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this option');
        }
    }
}
