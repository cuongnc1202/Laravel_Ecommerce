@extends('master.admin')

@section('title', 'Post Management')

@section('content')
    <div class="content">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="Enter keyword...">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            <a href="{{ route('blog.create') }}" type="submit" class="btn btn-success"><i class="fa fa-plus"
                    aria-hidden="true"></i> Create Post</a>
        </form>
        <hr>
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Avatar</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->name}}</td>
                    <td><img src="{{url('/uploads')}}/{{$blog->avatar}}" width="150"></td>
                    <td>{{$blog->status == 1 ? 'Display' : 'Hidden'}}</td>
                    <td>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
