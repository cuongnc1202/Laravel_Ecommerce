@extends('master.admin')

@section('title', 'Edit post: ' . $blog->name)

@section('content')
    <div class="container">
        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="name" value="{{ $blog->name }}" aria-describedby="helpId"
                    placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="avatar" placeholder="Select an image">
                <img src="{{ url('uploads') }}/{{ $blog->avatar }}" width="200">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea class="form-control description" name="content" id="" rows="6">{{ $blog->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $blog->status == 1 ? 'checked' : '' }}>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $blog->status == 0 ? 'checked' : '' }}>
                        Hidden
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@stop()
