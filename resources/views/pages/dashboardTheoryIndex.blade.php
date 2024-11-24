@extends('pages.dash')

@section('title', 'Theory')

@section('content')

    <!-- MODALINE FORMA PAKLAUSIMUI AR NORIME ISTRINTI -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{url('admin/theory/deleteTheory')}}" method="Post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">delete theory</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="theory_delete_id" id="theory_id" >
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
            <a href="{{ url('admin/theory/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add theory</a>
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
                        <th>image</th>
                        <th>description</th>
                        <th>topic title</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($theories as $theory)
                        <td>{{ $theory->id }}</td>
                        <td>{{ $theory->title }}</td>
                        <td><img src="{{ asset($theory->image) }}"   width='50' height='50' class="img img-responsive" alt="{{ $theory->title }}"></td>
                        <td>{!! nl2br($theory->description) !!}</td>
                        <td>{{ $theory->topic->title }}</td>
                        <td>
                            <a href="{{ url('admin/theory/'.$theory->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger deleteTheoryBtn"  value="{{$theory->id}}">Delete</button>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$theories-> links()}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.deleteTheoryBtn').click(function(e) {
                e.preventDefault();
                var theory_id = $(this).val();
                $('#theory_id').val(theory_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
