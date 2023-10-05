@extends('master.admin')

@section('title', 'Create Product Size')

@section('content')
    <div class="container">
        <form action="{{ route('size.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Size's name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" aria-describedby="helpId"
                    placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
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
