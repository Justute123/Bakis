@extends('pages.newsAsStudent')
@section('title', 'k Means method')

@section('content')

    <div class="row">
        <div class="col-4  mb-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('upload2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <label for="centers"> Centers: </label>
                <input type="text" name="centers" placeholder="Enter number of centers: ">
                <label for="startNr"> start number: </label>
                <input type="text" name="startNr" placeholder="Enter start number: ">
                <label for="maxIterations"> Max iterations: </label>
                <input type="text" name="maxIterations" placeholder="Enter number of max iterations: ">
                <label for="method">fviz_nbclust method: </label>
                <select name="method" id="method">
                    <option value="">--- Choose fviz_nbclust method ---</option>
                    <option value="wss">wss</option>
                    <option value="silhouette">silhouette</option>
                    <option value="gap_stat">gap_stat</option>
                </select>
                <button type="submit">Select</button>
            </form>

            @if (session('success'))
                <img src='/assets/img/kMeansDiagram.png' width="500" height="300">
                    <img src='/assets/img/kMeansDiagramSecond.png' width="500" height="300">
                <h1>Cluster sizes:</h1>
                    {{$contentSize}}
                    <hr>
                    <h1>Clusters:</h1>
                   {{$contentCluster}}
                    <hr>
                    <h1>Clusters centers:</h1>
                    {{$contentMeans}}


            @endif
        </div>
    </div>


@endsection
