@extends('pages.dash')

@section('title', 'Students')

@section('content')
    @section('content')
        <div class="card">
            <div class="card-header">
                <a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add student</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Role id</th>
                            <th>Email</th>
                            <th>Study programme</th>
                            <th>Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td>{{ $student->role_id}}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->study_programme }}</td>
                                <td>
                                    <a  class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Redaguoti</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$students-> links()}}
    @endsection
