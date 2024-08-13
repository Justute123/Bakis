@extends('pages.dash')

@section('title', 'Theory')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Add theory
            </h6>
        </div>
        <div class="card-body">
            <form action="{{route('theory.store')}}" method="post" enctype="multipart/form-data">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="title">Theory title: </label>
                    <input type="text" class="form-control" placeholder="Enter theory title: "
                           name="title" >
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>
                    <div class="form-group">
                        <label for="description">Theory description: </label>
                        <textarea type="textarea" class="form-control" placeholder="Enter theory description: "
                               name="description" rows="50" col="15" ></textarea>
                        <span class="text-danger"> @error('description') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image">
                        <span class="text-danger"> @error('image') {{$message}} @enderror</span>
                    </div>
                    <div  class="form-group">
                        <label for="topic_id">Select topic: </label>
                        <select name="topic_id" id="topic">
                            <option value="">Select topic</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}"> {{$topic->id}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"> @error('topic_id') {{$message}} @enderror</span>
                    </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
