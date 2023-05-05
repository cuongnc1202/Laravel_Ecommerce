@extends('master.admin')

@section('title', 'Chỉnh Sửa Khách Hàng: '.$customer->name)

@section('content')
    <div class="container">
        <form action="{{route('customer.update', $customer->id)}}" method="post">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Tên Khách Hàng</label>
                <input type="text" class="form-control" name="name" value="{{$customer->name}}" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Số Điện Thoại</label>
                <input type="number" class="form-control" name="phone" value="{{$customer->phone}}" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" class="form-control" name="address" value="{{$customer->address}}" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{$customer->email}}" aria-describedby="helpId"
                    placeholder="">
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="1" {{$customer->status == 1 ? 'checked' : ''}}>
                    Hiển thị
                  </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" value="0" {{$customer->status == 0 ? 'checked' : ''}} >
                    Tạm ẩn
                  </label>
                </div>
            </div>
            <button class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@stop()
