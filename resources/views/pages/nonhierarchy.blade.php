@extends('pages.newsAsStudent')
@section('title', 'Tools')

@section('content')

    <div class="row">
        <div class="col-4  mb-5">
            <div class="card" style="width: 18rem; background-color: orange;">
                <div class="card-body">
                    <h5 class="card-title">K-means</h5>
                    <p class="card-text">k-means clustering is a method of vector quantization, originally from signal processing, that aims to partition n observations into k clusters in which each observation belongs to the cluster with the nearest mean (cluster centers or cluster centroid), serving as a prototype of the cluster. </p>
                    <a href="{{ url('/kMeans') }}" class="btn btn-primary">Select</a>
                </div>
            </div>
        </div>
        <div class="col-4  mb-5">
            <div class="card" style="width: 18rem; background-color: orange;">
                <div class="card-body">
                    <h5 class="card-title">K-Medoids</h5>
                    <p class="card-text"> The k-medoids problem is a clustering problem similar to k-means.</p>
                    <a href="{{ url('/kMedoids') }}" class="btn btn-primary">Select</a>
                </div>
            </div>
        </div>
    </div>


@endsection
