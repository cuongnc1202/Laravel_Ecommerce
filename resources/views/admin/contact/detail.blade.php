@extends('master.admin')
@section('title', 'Chi Tiết Liên Hệ')

@section('content')

    <div class="content px-5">
        <div class="row">
            <form action="{{ route('contact.status', $contact->id) }}" method="post" class="form-inline">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option>Chọn 1</option>
                        <option value="0">Chưa xử lý</option>
                        <option value="1">Đã xử lý</option>
                    </select>
                    <button class="btn btn-danger">Cập nhật</button>
                </div>
            </form>
            @if ($contact->status == 1)
                <a href="" class="btn btn-success">Đã xử lý</a>
            @elseif ($contact->status == 0)
                <a href="" class="btn btn-primary">Chưa xử lý</a>
            @endif
        </div>
        <hr>
        <div class="row mt-5">
            <h5><b>Thông Tin Liên Hệ</b></h5>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->description }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>{{ $contact->status == 1 ? 'Chưa xử lý' : 'Đã xử lý' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

@stop()
