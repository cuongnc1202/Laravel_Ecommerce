@extends('master.admin')

@section('title', 'Banner Management')

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
            <a href="{{ route('banner.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Create Banner</a>
        </form>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Banner's name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td scope="row">{{ $banner->id }}</td>
                        <td>{{ $banner->name }}</td>
                        <td><img src="{{ url('uploads') }}/{{ $banner->image }}" width="120"></td>
                        <td>{!! $banner->description !!}</td>
                        <td>{{ $banner->status == 1 ? 'Display' : 'Hidden' }}</td>
                        <td>
                            <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                                @csrf @method('DELETE')
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning"><i
                                        class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
