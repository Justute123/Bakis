@extends('pages.dash')

@section('title', 'Students')

@section('content')
    <div class="card">
        <div class="card-header">
           <h5>Add new student</h5>
        </div>
        <div class="card-body">
            <form action="{{route('store')}}" method="post">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="name">Students name</label>
                    <input type="text" class="form-control" placeholder="Enter students name: "
                           name="name" value="">
                    <span class="text-danger"> @error('name') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" class="form-control" placeholder="Enter students surname: "
                           name="surname" value="">
                    <span class="text-danger"> @error('surname') {{$message}} @enderror</span>
                </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter students email: "
                               name="email" value="">
                        <span class="text-danger"> @error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="study_programme">Study programme</label>
                        <input type="text" class="form-control" placeholder="Enter students study programme: "
                               name="study_programme" value="">
                        <span class="text-danger"> @error('study_programme') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter students password: "
                               name="password" value="">
                        <span class="text-danger"> @error('password') {{$message}} @enderror</span>
                    </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

