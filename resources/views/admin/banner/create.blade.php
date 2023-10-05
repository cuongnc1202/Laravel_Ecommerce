@extends('master.admin')

@section('title', 'Create Banner')

@section('content')
    <div class="container">
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Banner's name</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                    placeholder="Nhập tên banner ...">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Select an image">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control description" name="description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1" checked>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0">
                        Hidden
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Create</button>
        </form>
    </div>
@stop()
