@extends('pages.dash')

@section('title', 'Quizes')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Add new quiz
            </h6>
        </div>
        <div class="card-body">
            <form action="{{route('quiz.store')}}" method="post">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="title">Quiz title: </label>
                    <input type="text" class="form-control" placeholder="Enter topics title: "
                           name="title"  >
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>
                    <div  class="form-group">
                        <label for="topic_id">Select topic: </label>
                        <select name="topic_id" id="topic">
                            <option value="">Select topic</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}"> {{$topic->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"> @error('topic_id') {{$message}} @enderror</span>
                    </div>
                    <div  class="form-group">
                        <label for="bloom_id">Select bloom category: </label>
                        <select name="bloom_id" id="bloom">
                            <option value="">Select bloom</option>
                            @foreach($bloomCategories  as $bloom)
                                <option value="{{$bloom->id}}"> {{$bloom->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"> @error('bloom_id') {{$message}} @enderror</span>
                    </div>

                     <input type="radio" id="available_id" name="isActive" value="1">
                     <label for="isActive">available</label><br>
                    <input type="radio" id="available_id" name="isActive" value="0">
                    <label for="isActive">unavailable</label><br>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
