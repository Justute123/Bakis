@extends('pages.newsAsStudent')
@section('title', 'Quizes')

@section('content')
    <h1>Results</h1>

    @php
        $storedArray = Session::get('storedArray',[]);
    @endphp
    @php
        $storedCorrectAnswers = Session::get('storedCorrectAnswers',[]);
    @endphp

    @php
        $storedPoint = Session::get('storedPoint',[]);
    @endphp
    @php
        $storedQuestion = Session::get('storedQuestion',[]);
        $count = count($storedQuestion);
    @endphp
    @php
        $ifNotCorrect = Session::get('$ifNotCorrect',[]);
    @endphp
    @php
        $calculatedPrecent = (Session::get('correctans')/$count)*100;
    @endphp
    @if($calculatedPrecent >= 80)
        <div class="alert alert-success" role="alert">
            <p style="color:black"> {{ round($calculatedPrecent)}}% correct answers, you are good :) </p>
        </div>
        @elseif($calculatedPrecent < 80 && $calculatedPrecent > 50)
        <div class="alert alert-info" role="alert">
            <p style="color:black"> {{ round($calculatedPrecent)}}% correct answers, you need to learn a bit more:) </p>
        </div>
        @else
        <div class="alert alert-danger" role="alert">
            <p style="color:black"> {{ round($calculatedPrecent)}}% correct answers, very bad :( study theory </p>
        </div>
    @endif

    <table class="table table-striped table-dark">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nr.</th>
            <th scope="col">Question</th>
            <th scope="col">Choosed option</th>
            <th scope="col">Point</th>
            <th scope="col">Correct answer</th>
        </tr>
        </thead>
        <tbody>
        <td>

            @php
            $i = 0;
            @endphp
               @while($i < $count)
                @php
                    $i++;
                @endphp
                   <p> {{$i}}</p>
               @endwhile

        </td>
        <td>
            @foreach($storedQuestion as $quest)
                <p>{{ $quest }}</p>
            @endforeach

        </td>
        <td>
            @foreach($storedArray as $option)
                <p>{{ $option }}</p>
            @endforeach
        </td>
        <td>
            @foreach($storedPoint as $point)
                <p>{{ $point }}</p>

            @endforeach
        </td>
        <td>
            @foreach($storedCorrectAnswers as $stored)


                @php


                    $optionText = $stored[0]->option_text;
                @endphp
                <p style="color:greenyellow">{{ $optionText}}</p>

            @endforeach
        </td>

        </tbody>
    </table>

    <h1 style="color:greenyellow"> correct answers : {{Session::get('correctans')}}</h1>
    <h1 style="color:red"> wrong answers : {{Session::get('wrongans')}}</h1>
    <h1> total points : {{Session::get('total')}}</h1>





@endsection
