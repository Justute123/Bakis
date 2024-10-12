@extends('pages.newsAsStudent')

@section('title', 'Results')

@section('content')


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>quiz id</th>
                <th>user id</th>
                <th>total</th>
                <th>correct answers</th>
                <th>wrong answers</th>
                <th> solving date</th>
            </tr>
            </thead>
            @foreach($results as $result)
            <tbody>
                <td>{{ $result->quiz_id}}</td>
                <td>{{ $result->user_id}}</td>
                <td>{{ $result->total }}</td>
                <td>{{ $result->correct_answers }}</td>
                <td>{{ $result->wrong_answers }}</td>
                <td>{{ $result->created_at }}</td>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection
