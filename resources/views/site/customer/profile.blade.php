@extends('master.home')

@section('title', 'Update Profile')

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
        <h2 class="text-center pt-3">Update Profile</h2>
        <form action="{{route('update.user')}}" method="post" class="py-3 px-3">
            @csrf @method('POST')
            <div class="row">
                <div class="form-group my-4 col-sm-6 col-xs-12">
                    <label for="">First Name:</label>
                    <input type="text" name="first_name" class="form-control form-control-lg" value="{{auth('customer')->user()->first_name}}" placeholder="">
                    @error('name') {{$message}} @enderror
                </div>
                <div class="form-group my-4 col-sm-6 col-xs-12">
                    <label for="">Last Name:</label>
                    <input type="text" name="last_name" class="form-control form-control-lg" value="{{auth('customer')->user()->last_name}}" placeholder="">
                    @error('name') {{$message}} @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group my-4 col-sm-6 col-xs-12">
                    <label for="">Phone:</label>
                    <input type="number" name="phone" class="form-control form-control-lg" value="{{auth('customer')->user()->phone}}" placeholder="">
                </div>
                <div class="form-group my-4 col-sm-6 col-xs-12">
                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control form-control-lg" value="{{auth('customer')->user()->email}}" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group my-4 col-12">
                    <label for="">Address:</label>
                    <input type="text" name="address" class="form-control form-control-lg" value="{{auth('customer')->user()->address}}" placeholder="">
                </div>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{route ('site.index')}}" class="btn btn-primary">Cancel</a>
            </div>
    
        </form>
    </div>
</div>

 @stop()