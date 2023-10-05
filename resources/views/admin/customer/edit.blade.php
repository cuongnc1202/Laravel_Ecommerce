@extends('master.admin')

@section('title', 'Edit Customer: '.$customer->name)

@section('content')
    <div class="container">
        <form action="{{route('customer.update', $customer->id)}}" method="post">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" {{$customer->status == 1 ? 'checked' : ''}}>
                    Active
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" {{$customer->status == 0 ? 'checked' : ''}} >
                    Blocked
                  </label>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@stop()
