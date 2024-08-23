@extends('pages.dash')

@section('title', 'Options')

@section('content')
    <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('admin/options/deleteOptions')}}" method="Post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete option</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="option_delete_id" id="option_id" >
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
            <a href="{{ url('admin/options/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add option</a>
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
                        <th>option text</th>
                        <th>question_id</th>
                        <th>order</th>
                        <th>isCorrect</th>
                        <th>point</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($options as $option)
                        <td>{{ $option->id }}</td>
                        <td>{{ $option->option_text }}</td>
                        <td>{{ $option->question_id }}</td>
                        <td>{{ $option->order }}</td>
                        <td>{{ $option->isCorrect }}</td>
                        <td>{{ $option->point }}</td>
                        <td>
                            <a href="{{ url('admin/options/'.$option->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteOptionBtn"  value="{{$option->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$options-> links()}}

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteOptionBtn').click(function(e) {
                e.preventDefault();
                var option_id = $(this).val();
                $('#option_id').val(option_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection





