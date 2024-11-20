@extends('pages.newsAsStudent')
@section('title', 'Hierarchy methods')

@section('content')

    <div class="row">
        <div class="col-4  mb-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                <label for="aglo_method">The agglomeration(linkage) method:</label>
                <select name="aglo_method" id="aglo_method">
                    <option value="">--- Choose agglomeration(linkage) method ---</option>
                    <option value="ward.D">ward.D</option>
                    <option value="ward.D2">ward.D2</option>
                    <option value="single">single</option>
                    <option value="complete">complete</option>
                    <option value="average">average</option>
                    <option value="median">median</option>
                    <option value="centroid">centroid</option>
                </select>
                <label for="dist_method">Distance method:</label>
                <select name="dist_method" id="dist_method">
                    <option value="">--- Choose distance method ---</option>
                    <option value="euclidean">euclidean</option>
                    <option value="manhattan">manhattan</option>
                </select>
                <button type="submit">Select</button>
            </form>

            @if (session('success'))
                <img src='/assets/img/dendogram.png' width="500" height="300">


                {{ $content }}
            @endif
        </div>
    </div>


@endsection
