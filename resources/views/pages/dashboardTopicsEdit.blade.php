@extends('pages.dash')

@section('title', 'Topics')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current topic
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('topics.update', $topic->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Topic title: </label>
                    <input type="text" class="form-control" placeholder="Enter topics title: "
                           name="title" value="{{$topic->title}}" >
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
