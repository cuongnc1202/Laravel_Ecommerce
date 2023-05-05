@extends('master.admin')

@section('title', 'Thêm Tin Tức')

@section('content')
    <div class="container">
        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="">Tiêu Đề</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="helpId"
                    placeholder="Nhập tiêu đề bài viết ...">
                @error('name') {{ $message}} @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="avatar" placeholder="Select an image">
            </div>
            <div class="form-group">
              <label for="">Nội Dung</label>
              <textarea class="form-control description" name="content" rows="6">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status"  value="1" checked>
                    Hiển thị
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0"  >
                    Tạm ẩn
                  </label>
                </div>
            </div>
            <button class="btn btn-success">Thêm</button>
        </form>
    </div>
@stop()
