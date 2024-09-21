@extends('pages.dash')

@section('title', 'Option')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current option
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('option.update', $option->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="option_text">Option text: </label>
                    <input type="text" class="form-control" placeholder="Enter Option text: "
                           name="option_text" value="{{$option->option_text}}" >
                    <span class="text-danger"> @error('option_text') {{$message}} @enderror</span>
                </div>
                <div  class="form-group">
                    <label for="question_id">Select question: </label>
                    <select name="question_id" id="question">
                        <option value="">Select question</option>
                        @foreach($questions as $question)
                            <option> {{$question->id}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('question_id') {{$message}} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="order">Option order: </label>
                    <input type="text" class="form-control" placeholder="Enter order: "
                           name="order" value="{{$option->order}}" >
                    <span class="text-danger"> @error('order') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="point">Option point: </label>
                    <input type="text" class="form-control" placeholder="Enter point: "
                           name="point" value="{{$option->point}}">
                    <span class="text-danger"> @error('point') {{$message}} @enderror</span>
                </div>
                <input type="radio" id="isCorrect_id" name="isCorrect" value="1">
                <label for="isCorrect">is correct</label><br>
                <input type="radio" id="isCorrect_id" name="isCorrect" value="0">
                <label for="isCorrect">is not correct</label><br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
