<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Theory;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Topic;

class QuizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizes = Quiz::paginate('5');
        return view('pages.dashboardQuizIndex', compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::paginate('5');
        return view('pages.dashboardQuizForm', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required|string|max:255',
                'topic_id' => 'required|not_in:0',
                'isActive' => 'required',]
        );

        $quiz= new Quiz();
        $quiz->title=$request->title;
        $quiz->topic_id=$request->topic_id;
        $quiz->isActive=$request->isActive;


        $res = $quiz -> save();
        if($res){
            return redirect('admin/quizes')->with('success', 'Quiz is added succsfully');
        }
        else{
            return redirect('admin/quizes')->with('fail', 'Quiz is not added succsfully');

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
        $quiz = Quiz::findOrFail($id);
        $topics = Topic::paginate('5');



        return view('pages.dashboardQuizEdit',compact('quiz','topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'title' => 'required|string|max:255',
                'topic_id' => 'required|not_in:0',
                'isActive' => 'required',]
        );

        $quiz= new Quiz();
        $quiz->title=$request->title;
        $quiz->topic_id=$request->topic_id;
        $quiz->isActive=$request->isActive;


        $quiz->update($request->all());
        $res = $quiz -> save();
        if($res){
            return redirect('admin/quizes')->with('success', 'Quiz is added succsfully');
        }
        else{
            return redirect('admin/quizes')->with('fail', 'Quiz is not added succsfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $quiz = Quiz::findOrFail($request->quiz_delete_id);
        try {
            $quiz->delete();
            return redirect('admin/quizes')->with('success', 'Quiz was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this qui');
        }
    }
}
