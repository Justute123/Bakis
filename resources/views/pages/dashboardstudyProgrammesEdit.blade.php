@extends('pages.dash')

@section('title', 'Study programmes')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current study Programme
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('studyProgramme.update', $studyProgramme->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Study programme title: </label>
                    <input type="text" class="form-control" placeholder="Enter study programme title: "
                           name="title" value="{{$studyProgramme->title}}" >
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
