@extends('pages.newsAsStudent')

@section('title', 'Searched theory')

@section('content')


    <div class="row">
        @php
            $counter = 0;
        @endphp
    @if (count($searchResults) > 0)

        @foreach ($searchResults as $searchResult)
            <div class="col-4  mb-5">

                @php
                    $counter++;
                    @endphp

                <div class="card text-white bg-dark ms-10"id="suc" style="max-width: 18rem;">
                 <div class="card-header ">{{ $counter }}

                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $searchResult->title }}</h5>

                        <a href="{{ url('/theory/'.$searchResult->id.'/show') }}" class="btn btn-primary stretched-link">Read more</a>

                    </div>
                </div>
            </div>
        @endforeach
    @else
    <p>No results found.</p>
    @endif
    </div>


    @endsection



