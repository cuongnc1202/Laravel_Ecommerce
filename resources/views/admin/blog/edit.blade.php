@extends('master.admin')

@section('title', 'Chỉnh sửa bài viết: ' . $blog->name)

@section('content')
    <div class="container">
        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Tiêu Đề</label>
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
                <label for="">Nội Dung</label>
                <textarea class="form-control description" name="content" id="" rows="6">{{ $blog->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1"
                            {{ $blog->status == 1 ? 'checked' : '' }}>
                        Hiển thị
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0"
                            {{ $blog->status == 0 ? 'checked' : '' }}>
                        Tạm ẩn
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@stop()
