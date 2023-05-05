@extends('master.admin')

@section('title', 'Sửa banner: ' . $material->name)

@section('content')
    <div class="container">
        <form action="{{ route('material.update', $material->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Tên Banner</label>
                <input type="text" class="form-control" name="name" value="{{ $material->name }}"
                    aria-describedby="helpId" placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $material->status == 1 ? 'checked' : '' }}>
                        Hiển thị
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $material->status == 0 ? 'checked' : '' }}>
                        Tạm ẩn
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@stop()
