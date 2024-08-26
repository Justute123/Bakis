@extends('pages.newsAsStudent')

@section('title', 'Theory show')

@section('content')

    <div class="card">
        <div class="card-header">
           teorija
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $theory->id }}</td>
                    </tr>
                    <tr>
                        <td>title</td>
                        <td>{{ $theory->title }}</td>
                    </tr>
                    <tr>
                        <td>image</td>
                        <td><img src="{{ asset($theory->image) }}"   width='50' height='50' class="img img-responsive" alt="{{ $theory->title }}"></td>
                    </tr>
                    <tr>
                        <td>description</td>
                        <td>{{ $theory->description }}</td>
                    </tr>
                    <tr>
                        <td>topic</td>
                        <td>{{ $theory->topic->title }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
