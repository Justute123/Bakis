@extends('pages.dash')

@section('title', 'Topics')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit current topic
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('theory.update', $theory->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Theory title: </label>
                    <input type="text" class="form-control" placeholder="Enter theory title: "
                           name="title"  value="{{$theory->title}}">
                    <span class="text-danger"> @error('title') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="description">Theory description: </label>
                    <textarea type="textarea" class="form-control" placeholder="Enter theory description: "
                              name="description" rows="50" col="15" >{{$theory->description}}</textarea>
                    <span class="text-danger"> @error('description') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image">
                    <span class="text-danger"> @error('image') {{$message}} @enderror</span>
                </div>
                <div  class="form-group">
                    <label for="topic_id">Select topic: </label>
                    <select name="topic_id" id="topic">
                        <option value="">Select topic</option>
                        @foreach($topics as $topic)
                            <option value="{{$topic->id}}"> {{$topic->id}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"> @error('topic_id') {{$message}} @enderror</span>
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
