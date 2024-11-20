@extends('pages.newsAsStudent')
@section('title', 'Tools')

@section('content')

    <div class="row">
        <div class="col-4  mb-5">
            <div class="card" style="width: 18rem; background-color: green;">
                <div class="card-body">
                    <h5 class="card-title">Hierarchy cluster methods</h5>
                    <p class="card-text">is a method of cluster analysis that seeks to build a hierarchy of clusters</p>
                    <a href="{{ url('/hierarchy') }}" class="btn btn-primary">Select</a>
                </div>
            </div>
            </div>
        <div class="col-4  mb-5">
            <div class="card" style="width: 18rem; background-color: green;">
                <div class="card-body">
                    <h5 class="card-title">Non-hierarchy cluster methods</h5>
                    <p class="card-text"> points to straightforwardly relegating information focuses to clusters without considering a progressive structure.</p>
                    <a href="{{ url('/nonhierarchy') }}" class="btn btn-primary">Select</a>
                </div>
            </div>
        </div>
    </div>


@endsection
