<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Theory;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Topic;
use App\Models\Bloom;

class QuizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizes = Quiz::paginate('5');
        $bloomCategories = Bloom::all();
        return view('pages.dashboardQuizIndex', compact('bloomCategories','quizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::paginate('5');
        $bloomCategories = Bloom::all();
        return view('pages.dashboardQuizForm', compact('topics','bloomCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'title' => 'required|string|max:255',
                'topic_id' => 'required|not_in:0',
                'isActive' => 'required',
                'bloom_id' => 'nullable|not_in:0']
        );

        $quiz= new Quiz();
        $quiz->title=$request->title;
        $quiz->topic_id=$request->topic_id;
        $quiz->isActive=$request->isActive;
        $quiz->bloom_id=$request->bloom_id;


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
        $bloomCategories = Bloom::all();




        return view('pages.dashboardQuizEdit',compact('quiz','topics','bloomCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
                'title' => 'required|string|max:255',
                'topic_id' => 'required|not_in:0',
                'isActive' => 'required',
                'bloom_id' => 'nullable']
        );


        $quiz = Quiz::findOrFail($id);
        $quiz->title=$request->title;
        $quiz->topic_id=$request->topic_id;
        $quiz->isActive=$request->isActive;
        $quiz->bloom_id=$request->bloom_id;


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
            return back()->with('error', 'you can not delete this quiz because it is used in options and questions');
        }
    }
}
