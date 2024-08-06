@extends('pages.dash')

@section('title', 'Users')

@section('content')
    @section('content')
        <div class="card">
            <div class="card-header">
                <a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add user</a>
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
                            <th>Address</th>
                            <th>Tel nr.</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone}}</td>
                                <td>{{ $user->email }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$users-> links()}}
    @endsection
