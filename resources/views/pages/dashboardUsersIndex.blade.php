@extends('pages.dash')

@section('title', 'Students')

@section('content')

        <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{url('admin/users/deleteStudent')}}" method="Post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">delete student</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="student_delete_id" id="student_id" >
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

                <a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add student</a>
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
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Role id</th>
                            <th>Email</th>
                            <th>Study programme</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td>{{ $student->role_id}}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->study_programme}}</td> <!-- Adjusted line -->
                                <td>
                                    <a href="{{ url('admin/users/'.$student->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-danger deleteStudentBtn"  value="{{$student->id}}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    @endsection

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.deleteStudentBtn').click(function(e) {
                    e.preventDefault();
                    var student_id = $(this).val();
                    $('#student_id').val(student_id);
                    $('#deleteModal').modal('show');
                });
            });
        </script>
    @endsection

