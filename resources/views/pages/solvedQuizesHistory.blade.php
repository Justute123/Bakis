@extends('pages.newsAsStudent')

@section('title', 'Results')

@section('content')
    <div>

    <form  method="post" action={{ route('sorted') }} >
        @csrf
        <select name="sortOption"  class="form-select mb-4" onchange="this.form.submit()" >
            <option  value="selection">Select</option>
            <option  value="total_desc">Sort by total descending</option>

        </select>

    </form>


    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>quiz name</th>
                <th>user name</th>
                <th>total</th>
                <th>correct answers</th>
                <th>wrong answers</th>
                <th> solving date</th>
            </tr>
            </thead>
            @foreach($results as $result)
            <tbody>
                <td>{{ $result->quiz->title}}</td>
                <td>{{ $result->user->name}}</td>
                <td>{{ $result->total }}</td>
                <td>{{ $result->correct_answers }}</td>
                <td>{{ $result->wrong_answers }}</td>
                <td>{{ $result->created_at }}</td>
            </tbody>
            @endforeach
        </table>
    </div>

@endsection
