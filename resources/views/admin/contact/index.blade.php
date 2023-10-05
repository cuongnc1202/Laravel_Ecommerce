@extends('master.admin')

@section('title', 'Contact Management')

@section('content')
    <div class="content px-5">
        <hr>
        <form action="" method="GET" class="form-inline" role="form">
            @csrf
            <div class="form-group">
                <label class="sr-only" for=""></label>
                <input class="form-control" name="keyword" placeholder="type keyword...">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <hr>
        <table class="table table-striped table-inverse mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Customer's name</th>
                    <th>Topic</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td scope="row">{{ $contact->id }}</td>
                        <td>{{ $contact->name}}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>{{ $contact->status == 0 ? 'In process' : 'Done' }}</td>
                        <td> <a class="text-white btn btn-success" href="{{ route('contact.show', $contact->id) }}">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop()
