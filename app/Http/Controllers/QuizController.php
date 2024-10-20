<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;
use App\Models\Quiz;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Support\Facades\Auth; // Correct for Auth facade


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
        $storedArray = Session::put('storedArray',[]);
        $storedCorrectAnswers = Session::put('storedCorrectAnswers',[]);
        $storedPoint = Session::put('storedPoint',[]);
        $storedQuestion = Session::put('storedQuestion',[]);
        $quiz = Quiz::findOrFail($id);
        //dd($quiz);

        $questionsFilteredByQuiz = DB::table('questions')
            ->select('*')
            ->where('quiz_id',$quiz->id)
            ->get();
        $orderedQuestions = $questionsFilteredByQuiz->sortBy('order');
        $question = $orderedQuestions -> first();

        if ($questionsFilteredByQuiz->isEmpty()) {
            return redirect()->back()->with('error', 'No questions available for this quiz.');
        }


        $optionsFilteredByQuestion = DB::table('options')
            ->select('*')
            ->where('question_id',$question->id)
            ->get();
        $orderedOptions = $optionsFilteredByQuestion->sortBy('order');

        return view('pages.questionsFilteredByQuiz', compact('orderedOptions','question','quiz','optionsFilteredByQuestion','orderedOptions'));
    }
    public function submitAnswer(Request $request)
    {



        $next = Session::get('next');
        $storedArray = Session::get('storedArray');
        $storedCorrectAnswers = Session::get('storedCorrectAnswers');
        $storedPoint = Session::get('storedPoint');
        $storedQuestion = Session::get('storedQuestion');

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

        $correctans = Session::get('correctans');
        $wrongans = Session::get('wrongans');
        $total = Session::get('total');

        $storedQuestion[] =$request->questionText;
        Session::put('storedQuestion',$storedQuestion);
        $selectedOptionId = $request->input('selectedOption');
        $selectedOptionData = $request->input("options.$selectedOptionId");
        $checkIf = $selectedOptionData['checkIf'];
        $optionText = $selectedOptionData['optionText'];
        $point = $selectedOptionData['point'];
        $currentQuestion = $orderedQuestions[$next - 1];


        if($next < $numberOfItems)
        {
            $question = $orderedQuestions[$next];
            $optionsFilteredByQuestion = DB::table('options')
                ->select('*')
                ->where('question_id',$question->id)
                ->get();
            $orderedOptions = $optionsFilteredByQuestion->sortBy('order');

            $storedCorrectAnswers[] = DB::table('options')
                ->select('option_text')
                ->where('question_id', $currentQuestion->id)
                ->where('isCorrect','1')
                ->get();
            Session::put('storedCorrectAnswers', $storedCorrectAnswers);



            if($checkIf == 1)
            {

                $correctans++;
                $total = $total + $point;
                $storedArray[] = $optionText;
                $storedPoint[] =$point;
                Session::put('storedArray', $storedArray);
                Session::put('storedPoint', $storedPoint);

                Session::put('total',$total);
                Session::put('correctans',$correctans);
            }



            if($checkIf == 0)
            {


                    $wrongans++;
                    $storedArray[] = $optionText;
                    $storedPoint[] =$point;
                    Session::put('storedArray', $storedArray);
                    Session::put('storedPoint', $storedPoint);
                    Session::put('wrongans',$wrongans);


            }


            return view('pages.questionsFilteredByQuiz', compact('question','quiz','optionsFilteredByQuestion','orderedOptions'));
        }


        if($next >= $numberOfItems)
        {
            $storedCorrectAnswers[] = DB::table('options')
                ->select('option_text')
                ->where('question_id', $currentQuestion->id)
                ->where('isCorrect','1')
                ->get();
            Session::put('storedCorrectAnswers', $storedCorrectAnswers);

            if($checkIf == 1)
            {

                $correctans++;
                $total = $total + $point;
                $storedArray[] = $optionText;
                $storedPoint[] =$point;
                Session::put('storedArray', $storedArray);
                Session::put('storedPoint', $storedPoint);

                Session::put('total',$total);
                Session::put('correctans',$correctans);
            }



            if($checkIf == 0)
            {

                $wrongans++;
                $storedArray[] = $optionText;
                $storedPoint[] =$point;
                Session::put('storedArray', $storedArray);
                Session::put('storedPoint', $storedPoint);
                Session::put('wrongans',$wrongans);



            }


            $results = new Result();
            $correctans = Session::get('correctans');
            $wrongans = Session::get('wrongans');
            $total2 = Session::get('total');
            $results->quiz_id = $request->currentQuizId;
            $results->user_id = Auth::user()->id;
            $results->total = $total2;
            $results->correct_answers = $correctans;
            $results->wrong_answers = $wrongans;
            $results->save();





            return view('pages.quizEnd');
        }


    }
    public function filterRightAnswers()
    {

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
