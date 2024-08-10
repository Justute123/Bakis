@extends('pages.dash')

@section('title', 'Study programmes')

@section('content')
    <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('admin/studyProgrammes/deleteStudyProgramme')}}" method="Post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete topic</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="studyProgramme_delete_id" id="studyProgramme_id" >
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
            <a href="{{ url('admin/studyProgrammes/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add study programme</a>
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
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studyProgrammes as $studyProgramme)
                        <td>{{ $studyProgramme->id }}</td>
                        <td>{{ $studyProgramme->title }}</td>
                        <td>
                            <a href="{{ url('admin/studyProgrammes/'.$studyProgramme->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteStudyProgrammeBtn"  value="{{$studyProgramme->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$studyProgrammes-> links()}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteStudyProgrammeBtn').click(function(e) {
                e.preventDefault();
                var studyProgramme_id = $(this).val();
                $('#studyProgramme_id').val(studyProgramme_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
