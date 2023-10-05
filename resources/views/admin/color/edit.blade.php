@extends('master.admin')

@section('title', 'Edit Color: ' . $color->name)

@section('content')
    <div class="container">
        <form action="{{ route('color.update', $color->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Color's name</label>
                <input type="text" class="form-control" name="name" value="{{ $color->name }}"
                    aria-describedby="helpId" placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Color's slug</label>
                <input type="text" class="form-control" name="slug" value="{{ $color->slug }}"
                    aria-describedby="helpId" placeholder="">
                @error('slug')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $color->status == 1 ? 'checked' : '' }}>
                        Display
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $color->status == 0 ? 'checked' : '' }}>
                        Hidden
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@stop()
