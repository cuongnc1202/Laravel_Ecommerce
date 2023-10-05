@extends('master.home')

@section('title', 'Tin Tức')

@section('content')

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-md-8 col-sm-12">
                <div class="row text-center">
                    <h2 style="text-decoration: none; text-transform: capitalize">{{$blog->name}}</h2>
                </div>
                <div class="row mt-5 text-center">
                    <h2><img src="{{url('uploads')}}/{{$blog->avatar}}" alt=""></h2>
                </div>
                <div class="row mt-5">
                    <h2>{!! $blog->content !!}</h2>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12" style="background-color: #ffffff; border: solid 1px rgb(224, 219, 219)">
                <h2 class="text-center pt-3">TIN KHÁC</h2>
                <hr>
                @foreach($blogs as $blog)
                <div class="row pb-3">
                    <a style="text-decoration: none" href="{{route('blog.detail',  $blog->id)}}">
                        <div class="card text-left">
                            <img class="card-img-top" src="{{url('/uploads')}}/{{$blog->avatar}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title text-success">{{$blog->name}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@stop()