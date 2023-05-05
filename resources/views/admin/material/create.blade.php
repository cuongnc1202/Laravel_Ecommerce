@extends('master.admin')

@section('title', 'Tạo Chất Liệu Sản Phẩm')

@section('content')
    <div class="container">
        <form action="{{ route('material.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên Chất Liệu</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" aria-describedby="helpId"
                    placeholder="">
                @error('name')
                    {{ $message }}
                @enderror
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
