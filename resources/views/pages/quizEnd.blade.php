@extends('pages.newsAsStudent')
@section('title', 'Quizes')

@section('content')
    <h1>Results</h1>
    @php
        $storedArray = Session::get('storedArray',[]);
    @endphp
    @php
        $storedPoint = Session::get('storedPoint',[]);
    @endphp
    @php
        $storedQuestion = Session::get('storedQuestion',[]);
        $count = count($storedQuestion);
    @endphp

    <table class="table table-striped table-dark">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nr.</th>
            <th scope="col">Question</th>
            <th scope="col">Option</th>
            <th scope="col">Point</th>
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
        </tbody>
    </table>

    <h1> correct answers : {{Session::get('correctans')}}</h1>
    <h1> wrong answers : {{Session::get('wrongans')}}</h1>
    <h1> total points : {{Session::get('total')}}</h1>


@endsection
