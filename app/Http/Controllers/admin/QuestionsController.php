<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::paginate('5');
        return view('pages.dashboardQuestionsIndex', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizes = Quiz::paginate('5');
        return view('pages.dashboardQuestionsForm', compact('quizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'question_text' => 'required|string|max:255',
                'hint' => 'required|string|max:255',
                'order' => 'required|numeric|max:255',
                'question_id' => 'required|not_in:0',
                'type' => 'required',]
        );

        $question= new Question();
        $question->question_text=$request->question_text;
        $question->hint=$request->hint;
        $question->order=$request->order;
        $question->question_id=$request->question_id;
        $question->type=$request->type;


        $res = $question -> save();
        if($res){
            return redirect('admin/questions')->with('success', 'Question is added succsfully');
        }
        else{
            return redirect('admin/questions')->with('fail', 'Question is not added succsfully');

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
