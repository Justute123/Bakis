<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;
use App\Models\Quiz;
use App\Models\Option;
use App\Models\Question;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizes = Quiz::all();
        return view('pages.quiz', compact('quizes'));
    }


    public function filterQuestionsByQuizId(string $id, Request $request)
    {
        Session::put('next','0');
        Session::put('wrongans','0');
        Session::put('correctans','0');
        Session::put('total','0');
        $quiz = Quiz::findOrFail($id);

        $questionsFilteredByQuiz = DB::table('questions')
            ->select('*')
            ->where('quiz_id',$quiz->id)
            ->get();
        $orderedQuestions = $questionsFilteredByQuiz->sortBy('order');
        $question = $orderedQuestions -> first();

        $optionsFilteredByQuestion = DB::table('options')
            ->select('*')
            ->where('question_id',$question->id)
            ->get();
        $orderedOptions = $optionsFilteredByQuestion->sortBy('order');

        return view('pages.questionsFilteredByQuiz', compact('orderedOptions','question','quiz','optionsFilteredByQuestion','orderedOptions'));
    }
    public function submitAnswer(Request $request)
    {

        //Validacijos reikia

        $next = Session::get('next');
        $next++;
        Session::put('next',$next);
        $quiz = new Quiz();
        $quiz->id = $request->currentQuizId;


        $questionsFilteredByQuiz = DB::table('questions')
            ->select('*')
            ->where('quiz_id',$request->currentQuizId)
            ->get();
        $orderedQuestions = $questionsFilteredByQuiz->sortBy('order');
        $numberOfItems = $orderedQuestions -> count();

        if($next < $numberOfItems)
        {
            $question = $orderedQuestions[$next];
            $optionsFilteredByQuestion = DB::table('options')
                ->select('*')
                ->where('question_id',$question->id)
                ->get();
            $orderedOptions = $optionsFilteredByQuestion->sortBy('order');

            $correctans = Session::get('correctans');
            $total = Session::get('total');
            if($request->checkIfCorrect == 1)
            {
                $correctans++;
                $total = $total + ($request->point);
                Session::put('total',$total);
                Session::put('correctans',$correctans);
            }

            $wrongans = Session::get('wrongans');
            if($request->checkIfCorrect == 0)
            {
                $wrongans++;
                Session::put('wrongans',$wrongans);
            }

            return view('pages.questionsFilteredByQuiz', compact('question','quiz','optionsFilteredByQuestion','orderedOptions'));
        }

        if($next >= $numberOfItems)
        {
            return view('pages.quizEnd');
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
