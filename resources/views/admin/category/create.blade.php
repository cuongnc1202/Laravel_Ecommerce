@extends('master.admin')

@section('title', 'Thêm Danh Mục')

@section('content')
    <div class="container">
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="">Tên Danh Mục</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="helpId"
                    placeholder="Nhập tên danh mục ...">
                @error('name') {{ $message }} @enderror
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control" name="image" placeholder="Chọn hình ảnh ...">
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
