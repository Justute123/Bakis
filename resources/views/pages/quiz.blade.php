@extends('pages.newsAsStudent')
@section('title', 'Quizes')

@section('content')

    @php

           $counter = 0;
    @endphp
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}

            @php
                Session::forget('error');
            @endphp
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>nr.</th>
                <th>quiz title</th>
                <th>topic name</th>
                <th>action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($quizes as $quiz)
                @php
                       $counter++;
                @endphp

                @if($quiz->isActive == '1')
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->topic->title }}</td>
                    <td>
                    <a href="{{ url('quiz/'.$quiz->id) }}" class="btn btn-primary">
                       Solve
                    </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
