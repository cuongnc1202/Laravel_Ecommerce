@extends('master.admin')

@section('title', 'Create Post')

@section('content')
    <div class="container">
        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="helpId"
                    placeholder="Type here...">
                @error('name') {{ $message}} @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="avatar" placeholder="Select an image">
            </div>
            <div class="form-group">
              <label for="">Content</label>
              <textarea class="form-control description" name="content" rows="6">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status"  value="1" checked>
                    Dislay
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0"  >
                    Hidden
                  </label>
                </div>
            </div>
            <button class="btn btn-success">Create</button>
        </form>
    </div>
@stop()
