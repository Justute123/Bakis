@extends('pages.dash')

@section('title', 'Question')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current question
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('question.update', $question->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="question_text">Question text: </label>
                    <input type="text" class="form-control" placeholder="Enter Question text: "
                           name="question_text" >
                    <span class="text-danger"> @error('question_text') {{$message}} @enderror</span>
                </div>
                <div  class="form-group">
                    <label for="quiz_id">Select quiz: </label>
                    <select name="quiz_id" id="quiz">
                        <option value="">Select quiz</option>
                        @foreach($quizes as $quiz)
                            <option value="{{$quiz->id}}"> {{$quiz->id}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('quiz_id') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="order">Question order: </label>
                    <input type="text" class="form-control" placeholder="Enter order: "
                           name="order" >
                    <span class="text-danger"> @error('order') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="hint">Question hint: </label>
                    <input type="text" class="form-control" placeholder="Enter hint: "
                           name="hint" >
                    <span class="text-danger"> @error('hint') {{$message}} @enderror</span>
                </div>
                <input type="radio" id="type_id" name="type" value="1">
                <label for="type">open-question</label><br>
                <input type="radio" id="type_id" name="type" value="0">
                <label for="type">closed-question</label><br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
