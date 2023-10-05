@extends('master.admin')

@section('title', 'Customer Management')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Enter keyword...">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $cust)
                    <tr>
                        <td scope="row">{{ $cust->id }}</td>
                        <td>{{ $cust->first_name }} {{ $cust->last_name }}</td>
                        <td>{{ $cust->email }}</td>
                        <td>{{ $cust->phone }}</td>
                        <td>{{ $cust->address }}</td>
                        <td>
                            <a href="{{ route('customer.edit', $cust->id) }}" class="btn btn-warning"><i
                                    class="fa fa-edit"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
