@extends('master.home')

@section('title', 'Cập Nhật Thông Tin')

@section('content')

<div class="container my-5">
    <div class="login-form bg-light"  style="padding: 40px 100px">
        @if(Session::has('true'))
        <div class="alert alert-success text-center" role="alert">
            <strong>{{Session::get('true')}}</strong>
        </div>
        @endif
        @if(Session::has('false'))
        <div class="alert alert-danger text-center" role="alert">
            <strong>{{Session::get('false')}}</strong>
        </div>
        @endif
        <h2 class="text-center pt-5">Cập Nhật Thông Tin Người Dùng</h2>
        <form action="{{route('update.user')}}" method="post" class="py-5 px-5">
            @csrf @method('POST')
            <div class="form-group my-4">
                <label for="">Họ tên:</label>
                <input type="text" name="name" class="form-control form-control-lg" value="{{auth('customer')->user()->name}}" placeholder="Nhập tên đầy đủ ...">
                @error('name') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Số điện thoại:</label>
                <input type="number" name="phone" class="form-control form-control-lg" value="{{auth('customer')->user()->phone}}" placeholder="Nhập số điện thoại ...">
            </div>
            <div class="form-group my-4">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control form-control-lg" value="{{auth('customer')->user()->email}}" placeholder="Nhập email ...">
            </div>
            <div class="form-group my-4">
                <label for="">Địa chỉ:</label>
                <input type="text" name="address" class="form-control form-control-lg" value="{{auth('customer')->user()->address}}" placeholder="Nhập địa chỉ ...">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success btn-lg mt-5">Cập Nhật</button>
                <a href="{{route ('site.index')}}" class="btn btn-primary btn-lg mt-5">Hủy Bỏ</a>
            </div>
    
        </form>
    </div>
</div>

 @stop()