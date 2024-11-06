@extends('pages.dash')

@section('title', 'Questions')

@section('content')


    <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('admin/questions/deleteQuestions')}}" method="Post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete question</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="question_delete_id" id="question_id" >
                        <h5>Do your really want to delete this? </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes,delete it</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/questions/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add question</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>question text</th>
                        <th>quiz_id</th>
                        <th>order</th>
                        <th>hint</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->quiz->title }}</td>
                        <td>{{ $question->order }}</td>
                        <td>{{ $question->hint }}</td>
                        <td>
                            <a href="{{ url('admin/questions/'.$question->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteQuestionBtn"  value="{{$question->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$questions-> links()}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteQuestionBtn').click(function(e) {
                e.preventDefault();
                var question_id = $(this).val();
                $('#question_id').val(question_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection


