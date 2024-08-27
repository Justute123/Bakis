@extends('pages.newsAsStudent')

@section('title', 'Theory show')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="text">{{$theory->title}}</h2>
        </div>
        <div class="card-body">
            <img src="{{ asset($theory->image) }}"    class="img img-responsive" alt="{{ $theory->title }}">
            <h5 class="text">{{$theory->description}}</h5>

        </div>
    </div>


@endsection
