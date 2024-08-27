@extends('pages.newsAsStudent')
@section('title', 'Theory')

@section('content')
    <div class="row">
        @php
        $counter = 0;
        @endphp
        @foreach($theoryFilteredByTopic as $theory)
            <div class="col-4">

                @php
                $counter++;
                @endphp
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{ $counter }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $theory->title }}</h5>
                        <a href="{{ url('/theory/'.$theory->id.'/show') }}" class="btn btn-primary stretched-link">Read more</a>

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
