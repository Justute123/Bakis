@extends('pages.newsAsStudent')
@section('title', 'Quiz filtered by Bloom categories')

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}

            @php
                Session::forget('error');
            @endphp
        </div>
    @endif
    <div class="row">
        @foreach($bloomCategories as $bloomCategory)

            <div class="col-4 mb-5">
                <div class="card text-white bg-warning" style="max-width: 18rem;">
                    <div class="card-header">{{ $bloomCategory->id}}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $bloomCategory->title }}</h5>
                        <a href="{{ url('quizesFilteredByBloom/'.$bloomCategory->id) }}" class="btn btn-primary stretched-link">Read more</a>

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
