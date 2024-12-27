@extends('pages.newsAsStudent')
@section('title', 'Questions')

@section('content')

    <div class="modal" tabindex="-1" id="customAlertModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="blockModal">
                    <h3 class="modal-title-my">Attention</h3>
                </div>
                <div class="modal-body">
                    <h5 class="modal-body-my">Please choose option!</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card text-white bg-dark mb-5" style="max-width: 40rem;">

        <div class="card-body">

            <form name="forma" method="post" action="{{ route('submit', $question->id) }}" onsubmit="return validateForm()">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-4">
                            <h4> # {{Session::get("next")}}: {{$question->question_text}}</h4>

                            @foreach($orderedOptions as $option)

                                <input type="radio" id="{{$option->id}}" name="selectedOption" value="{{ $option->id }}">
                                <label for="optionText"> {{$option->option_text}}</label><br>
                                <input type="hidden" name="options[{{ $option->id }}][checkIf]" value="{{ $option->isCorrect }}">
                                <input type="hidden" name="options[{{ $option->id }}][optionText]" value="{{ $option->option_text}}">
                                <input type="hidden" name="options[{{ $option->id }}][point]" value="{{ $option->point}}">
                                <input style="visibility: hidden" value="{{$option->question_id}}" name="questionId">
                                <input style="visibility: hidden" value="{{$question->question_text}}" name="questionText">
                            @endforeach


                        </div>
                    </div>
                </div>
                <input style="visibility: hidden" value="{{$quiz->id}}" name="currentQuizId">
                <button type="submit" class="btn btn-warning">Next</button>

            </form>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm(){
            let x = document.forms["forma"]["selectedOption"].value;
            if(x=="")
            {
                $('#customAlertModal').modal('show');
                return false;
            }
            return true;

        }
    </script>

@endsection
