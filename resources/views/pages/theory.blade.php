@extends('pages.newsAsStudent')
@section('title', 'Theory')

@section('content')

    <div class="row">
    @foreach($theories as $theory)
        <div class="col-4">

        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">{{ $theory->id }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $theory->title }}</h5>
                <p class="card-text">{{ $theory->description }}</p>
                <a href="{{ url('/theory/'.$theory->id) }}" class="btn btn-primary stretched-link">Read more</a>

            </div>
        </div>
        </div>

    @endforeach

        </div>
@endsection
