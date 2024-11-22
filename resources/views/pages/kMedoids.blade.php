@extends('pages.newsAsStudent')
@section('title', 'k Medoids method')

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

            <form action="{{ route('upload3') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <label for="clusters"> number of clusters: </label>
                <input type="text" name="clusters" placeholder="Enter number of clusters: ">

                <label for="metric">Pam metric: </label>
                <select name="metric" id="metric">
                    <option value="">--- Choose PAM metric ---</option>
                    <option value="euclidean">euclidean</option>
                    <option value="manhattan">manhattan</option>

                </select>
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
                <h1>Cluster medoids:</h1>
                {{ $contentMedoids}}
                <hr>
                <h1>Clusters:</h1>
                {{$contentClusters}}
              


            @endif
        </div>
    </div>


@endsection
