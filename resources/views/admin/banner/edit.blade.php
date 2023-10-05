@extends('master.admin')

@section('title', 'Edit Banner: ' . $banner->name)

@section('content')
    <div class="container">
        <form action="{{ route('banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Banner's name</label>
                <input type="text" class="form-control" name="name" value="{{ $banner->name }}" aria-describedby="helpId"
                    placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Select an image">
                <img src="{{ url('uploads') }}/{{ $banner->image }}" width="100">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control description" name="description" rows="5">{{ $banner->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $banner->status == 1 ? 'checked' : '' }}>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $banner->status == 0 ? 'checked' : '' }}>
                        Hidden
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@stop()
