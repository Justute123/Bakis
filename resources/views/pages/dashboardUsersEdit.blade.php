@extends('pages.dash')

@section('title', 'Students')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current student
            </h6>
        </div>
        <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Students name</label>
                        <input type="text" class="form-control" placeholder="Enter students name: "
                               name="name" value="{{$student->name}}" >
                        <span class="text-danger"> @error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" placeholder="Enter students surname: "
                               name="surname" value="{{$student->surname}}" >
                        <span class="text-danger"> @error('surname') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter students email: "
                               name="email" value="{{$student->email}}" >
                        <span class="text-danger"> @error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="study_programme">Study programme</label>
                        <input type="text" class="form-control" placeholder="Enter students study programme: "
                               name="study_programme" value="{{$student->study_programme}}">
                        <span class="text-danger"> @error('study_programme') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter students password: "
                               name="password" value="{{$student->password}}" >
                        <span class="text-danger"> @error('password') {{$message}} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
        </div>
    </div>

@endsection

