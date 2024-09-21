@extends('pages.newsAsStudent')
@section('title', 'Questions')

@section('content')
    <div class="card text-white bg-dark mb-5" style="max-width: 40rem;">

        <div class="card-body">

            <form method="post" action="{{ route('submit', $question->id) }}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <h4> # {{Session::get("next")}}: {{$question->question_text}}</h4>
                            @foreach($orderedOptions as $option)

                                <input type="radio" id="{{$option->id}}" name="selectedOption" value="{{ $option->id }}">
                                <label for="optionText"> {{$option->option_text}}</label><br>
                                <input type="hidden" name="options[{{ $option->id }}][checkIf]" value="{{ $option->isCorrect }}">
                                <input type="hidden" name="options[{{ $option->id }}][optionText]" value="{{ $option->option_text}}">
                                <input type="hidden" name="options[{{ $option->id }}][point]" value="{{ $option->point}}">
                                <input style="visibility: hidden" value="{{$option->question_id}}" name="questionId">
                                <input style="visibility: hidden" value="{{$question->question_text}}" name="questionText">
                                <span class="text-danger"> @error('optionText') {{$message}} @enderror</span>



                            @endforeach



                        </div>
                    </div>
                </div>
                <input style="visibility: hidden" value="{{$quiz->id}}" name="currentQuizId">
                <button type="submit" class="btn btn-warning">Next</button>

            </form>
        </div>

    </div>

@endsection
