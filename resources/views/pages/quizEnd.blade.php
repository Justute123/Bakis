@extends('pages.newsAsStudent')
@section('title', 'Quizes')

@section('content')

<h1>Results</h1>
    <h1> correct answers : {{Session::get('correctans')}}</h1>
    <h1> wrong answers : {{Session::get('wrongans')}}</h1>
    <h1> totalPoints : {{Session::get('total')}}</h1>


@endsection
