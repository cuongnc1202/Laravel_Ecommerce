@extends('master.admin')

@section('title', 'Quản Lý Feedback')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Nhập từ khóa ...">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <hr>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Chủ Đề</th>
                    <th>Nội Dung</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td scope="row">{{ $contact->id }}</td>
                        <td>{{ $contact->name}}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{!! Str::words($contact->description, 15)  !!}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>{{ $contact->status == 0 ? 'Chưa xử lý' : 'Đã xử lý' }}</td>
                        <td> <a class="text-white btn btn-success" href="{{ route('contact.show', $contact->id) }}">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
