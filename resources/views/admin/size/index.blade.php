@extends('master.admin')

@section('title', 'Size Management')

@section('content')
    <div class="container-fluid px-5 py-3">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Enter keyword...">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="{{ route('size.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Add size</a>
        </form>
        <hr>
        <table class="table table-striped table-inverse ">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sizes as $size)
                    <tr>
                        <td scope="row">{{ $size->id }}</td>
                        <td>{{ $size->name }}</td>
                        <td>{{ $size->status == 1 ? 'Display' : 'Hidden' }}</td>
                        <td>
                            <form action="{{ route('size.destroy', $size->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('size.edit', $size->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
