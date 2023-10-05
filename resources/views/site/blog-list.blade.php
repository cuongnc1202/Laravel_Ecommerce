@extends('master.home')

@section('title', 'News')

@section('content')

    <section class=" py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-md-8 col-sm-12">
                    @foreach ($blogs as $blog)
                        <div class="row mb-5">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <a style="text-decoration: none; text-transform: capitalize" href="{{ route('blog.detail',$blog->id) }}"><img src="{{ url('/uploads') }}/{{ $blog->avatar }}" alt=""></a>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <a style="text-decoration: none; text-transform: capitalize" href="{{ route('blog.detail',$blog->id) }}"><h4 class="text-success"><b>{{ $blog->name }}</b></h4></a>
                                <p class="card-text">{!! Str::words($blog->content, 50) !!}</p>
                            </div>
                        </div>
                    @endforeach
                    {{ $blogs->links() }}
                </div>
                <div class="col-xl-4 col-md-4 col-sm-12">
                    
                </div>
            </div>
        </div>
    </section>

@stop()
