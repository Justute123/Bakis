@extends('pages.newsAsStudent')
@section('title', 'Quizes')

@section('content')

    @php
        $counter = 0;
    @endphp

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

                <td>{{ $counter }}</td>
                <td>{{ $quiz->title }}</td>
                <td>{{ $quiz->topic->title }}</td>
                <td><a href="{{ url('/quiz/'.$quiz->id) }}" class="btn btn-primary stretched-link">Solve</a></td>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
