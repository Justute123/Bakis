@extends('pages.dash')

@section('title', 'Options')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Add new option
            </h6>
        </div>
        <div class="card-body">
            <form action="{{route('option.store')}}" method="post">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="option_text">Option text: </label>
                    <input type="text" class="form-control" placeholder="Enter Option text: "
                           name="option_text" >
                    <span class="text-danger"> @error('option_text') {{$message}} @enderror</span>
                </div>
                <div  class="form-group">
                    <label for="question_id">Select question: </label>
                    <select name="question_id" id="question">
                        <option value="">Select question</option>
                        @foreach($questions as $question)
                            <option value="{{$question->id}}"> {{$question->question_text}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('question_id') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="order">Option order: </label>
                    <input type="text" class="form-control" placeholder="Enter order: "
                           name="order" >
                    <span class="text-danger"> @error('order') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="point">Option point: </label>
                    <input type="text" class="form-control" placeholder="Enter point: "
                           name="point" >
                    <span class="text-danger"> @error('point') {{$message}} @enderror</span>
                </div>
                <input type="radio" id="isCorrect_id" name="isCorrect" value="1">
                <label for="isCorrect">is correct</label><br>
                <input type="radio" id="isCorrect_id" name="isCorrect" value="0">
                <label for="isCorrect">is not correct</label><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
