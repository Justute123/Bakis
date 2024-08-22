@extends('pages.dash')

@section('title', 'Questions')

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/questions/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add question</a>
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
                        <th>question text</th>
                        <th>quiz_id</th>
                        <th>type</th>
                        <th>order</th>
                        <th>hint</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->quiz_id }}</td>
                        <td>{{ $question->type }}</td>
                        <td>{{ $question->order }}</td>
                        <td>{{ $question->hint }}</td>
                        <td>
                            <a href="{{ url('admin/questions/'.$question->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteQuestionBtn"  value="{{$question->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$questions-> links()}}

@endsection

