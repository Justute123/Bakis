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
                <div class="card text-white bg-dark ms-10"id="suc" style="max-width: 18rem;">
                    <div class="card-header ">{{ $counter }}
                        @if($theory->viewedTime !=null)
                        <span class="badge bg-success ms-3">Viewed</span>
                        @endif
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $theory->title }}</h5>

                        <a href="{{ url('/theory/'.$theory->id.'/show') }}" class="btn btn-primary stretched-link">Read more</a>

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
