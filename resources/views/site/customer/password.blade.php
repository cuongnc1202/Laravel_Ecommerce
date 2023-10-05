@extends('master.home')

@section('title', 'Change Password')

@section('content')

<div class="container my-5">
    <div class="login-form bg-light">
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
        <h2 class="text-center pt-5">Change Password</h2>
        <form action="{{route('update.password')}}" method="post" class="py-5 px-3">
            @csrf @method('POST')
            <div class="form-group my-4">
                <label for="">Old password:</label>
                <input type="password" name="old_password" class="form-control form-control-lg" placeholder="">
                @error('old_password') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">New password:</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="">
                @error('password') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Confirm password:</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="">
                @error('confirm_password') {{$message}} @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('site.index')}}" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
</div>

 @stop()