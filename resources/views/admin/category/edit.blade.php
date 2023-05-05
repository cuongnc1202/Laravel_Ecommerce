@extends('master.admin')

@section('title', 'Chỉnh sửa danh mục: ' . $category->name)

@section('content')
    <div class="container">
        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Tên Danh Mục</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                    aria-describedby="helpId" placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="image" placeholder="Select an image">
                <img src="{{ url('uploads') }}/{{ $category->image }}" width="100">
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $category->status == 1 ? 'checked' : '' }}>
                        Hiển thị
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $category->status == 0 ? 'checked' : '' }}>
                        Tạm ẩn
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@stop()
