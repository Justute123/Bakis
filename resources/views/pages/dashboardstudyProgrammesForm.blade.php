@extends('pages.dash')

@section('title', 'Study programmes')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Add new study programme
            </h6>
        </div>
        <div class="card-body">
            <form action="{{route('studyProgrammes.store')}}" method="post">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="title">Study programme title: </label>
                    <input type="text" class="form-control" placeholder="Enter study programme title: "
                           name="title" >
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
