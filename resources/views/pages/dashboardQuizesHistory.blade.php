@extends('pages.dash')

@section('title', 'Results')

@section('content')

    <div class="card">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>quiz title</th>
                        <th>user name</th>
                        <th>total </th>
                        <th>correct answers</th>
                        <th>wrong answers</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $counter = 0;
                    $totalEnd = 0;
                    @endphp
                    @foreach($results as $result)
                        <td>{{ $result->quiz->title }}</td>
                        <td>{{ $result->user->name }}</td>
                        <td>{{ $result->total }}</td>
                        <td>{{ $result->correct_answers}}</td>
                        <td>{{ $result->wrong_answers }}</td>
                        </tr>
    @php
   $counter++;
   $totalEnd=$totalEnd+$result->total;
    @endphp

@endforeach
<h1>Average points: {{$totalEnd/$counter}}</h1>
</tbody>
</table>
</div>
</div>
</div>


@endsection


