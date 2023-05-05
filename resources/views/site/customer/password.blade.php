@extends('master.home')

@section('title', 'Đổi Mật Khẩu')

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
        <h2 class="text-center pt-5">Thay Đổi Mật Khẩu</h2>
        <form action="{{route('update.password')}}" method="post" class="py-5 px-5">
            @csrf @method('POST')
            <div class="form-group my-4">
                <label for="">Mật khẩu cũ:</label>
                <input type="password" name="old_password" class="form-control form-control-lg" placeholder="">
                @error('old_password') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Mật khẩu mới:</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="">
                @error('password') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Nhập lại mật khẩu:</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="">
                @error('confirm_password') {{$message}} @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                <a href="{{route('site.index')}}" class="btn btn-primary btn-sm">Hủy</a>
            </div>
    
        </form>
    </div>
</div>

 @stop()