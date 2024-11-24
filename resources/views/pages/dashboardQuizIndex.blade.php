@extends('pages.dash')

@section('title', 'Quizes')

@section('content')

    <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('admin/quizes/deleteQuizes')}}" method="Post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete quiz</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="quiz_delete_id" id="quiz_id" >
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
            <a href="{{ url('admin/quizes/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add quiz</a>
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
                        <th>title</th>
                        <th>topic title</th>
                        <th>is active?</th>
                        <th>bloom categories</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quizes as $quiz)
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ $quiz->topic->title }}</td>
                        <td>{{$quiz->isActive}}</td>
                        <td>{{$quiz->bloom->title}}</td>
                        <td>
                            <a href="{{ url('admin/quizes/'.$quiz->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteQuizBtn"  value="{{$quiz->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$quizes-> links()}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteQuizBtn').click(function(e) {
                e.preventDefault();
                var quiz_id = $(this).val();
                $('#quiz_id').val(quiz_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection

