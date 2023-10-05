@extends('master.admin')

@section('title', 'Edit category: ' . $category->name)

@section('content')
    <div class="container">
        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Category's name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                    aria-describedby="helpId" placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}" aria-describedby="helpId"
                    placeholder="Type here...">
                @error('description') {{ $message }} @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="image" placeholder="Select an image">
                <img src="{{ url('uploads') }}/{{ $category->image }}" width="100">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $category->status == 1 ? 'checked' : '' }}>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $category->status == 0 ? 'checked' : '' }}>
                        Hidden
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@stop()
