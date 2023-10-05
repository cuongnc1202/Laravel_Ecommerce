@extends('master.admin')
@section('title', 'Contact Detail')

@section('content')

    <div class="content px-5">
        <div class="row">
            <form action="{{ route('contact.status', $contact->id) }}" method="post" class="form-inline">
                @csrf @method('PUT')
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option>Chọn 1</option>
                        <option value="0">In process</option>
                        <option value="1">Done</option>
                    </select>
                    <button class="btn btn-danger">Update</button>
                </div>
            </form>
            @if ($contact->status == 1)
                <a href="" class="btn btn-success">Done</a>
            @elseif ($contact->status == 0)
                <a href="" class="btn btn-primary">In process</a>
            @endif
        </div>
        <hr>
        <div class="row mt-5">
            <h5><b>Contact Infomation</b></h5>
            <table class="table table-striped table-inverse mt-3">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Customer's name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Message</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->description }}</td>
                        <td>{{ $contact->status == 0 ? 'In process' : 'Done' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

@stop()
