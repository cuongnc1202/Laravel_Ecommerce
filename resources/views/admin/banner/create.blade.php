@extends('master.admin')

@section('title', 'Tạo Banner')

@section('content')
    <div class="container">
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên Banner</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
                    placeholder="Nhập tên banner ...">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="">Hình Ảnh</label>
                <input type="file" class="form-control" name="image" placeholder="Select an image">
            </div>
            <div class="form-group">
                <label for="">Nội Dung</label>
                <textarea class="form-control description" name="description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1" checked>
                        Hiển thị
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0">
                        Tạm ẩn
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Tạo Mới</button>
        </form>
    </div>
@stop()
