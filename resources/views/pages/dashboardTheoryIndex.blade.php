@extends('pages.dash')

@section('title', 'Theory')

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/theory/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add theory</a>
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
                        <th>title</th>
                        <th>image</th>
                        <th>description</th>
                        <th>topic_id</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($theories as $theory)
                        <td>{{ $theory->id }}</td>
                        <td>{{ $theory->title }}</td>
                        <td><img src="{{ asset($theory->image) }}"   width='50' height='50' class="img img-responsive" alt="{{ $theory->title }}"></td>
                        <td>{{ $theory->description}}</td>
                        <td>{{ $theory->topic_id }}</td>
                        <td>
                            <a href="{{ url('admin/theory/'.$theory->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteTopicBtn"  value="{{$theory->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$theories-> links()}}
@endsection
