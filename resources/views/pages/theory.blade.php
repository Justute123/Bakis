@extends('pages.newsAsStudent')
@section('title', 'Topics')

@section('content')

    <table class="table table-dark">
        <thead>
        </thead>
        <tbody>
        @foreach($topics as $topic)
        <tr>
            <td><a href="{{ url('theory/'.$topic->id) }}"> {{$topic->title}} </a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
