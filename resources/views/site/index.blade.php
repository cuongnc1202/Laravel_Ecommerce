@extends('master.home')

@section('title', 'Trang Chủ')

@section('content')

    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banners as $bann)
                <li data-target="#template-mo-zay-hero-carousel" data-slide-to="{{ $loop->index }}"
                    class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="{{ url('/uploads') }}/{{ $banner->image }}" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left">
                                    <h1 class="h1 text-success"><b>{{ $banner->name }}</b></h1>
                                    <p>
                                        {!! $banner->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#template-mo-zay-hero-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#template-mo-zay-hero-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Danh Mục Của Tháng</h1>
                <p>
                    "Những danh mục có sản phẩm bán chạy nhất trong tháng"
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($topCategory as $topCat)
                <div class="col-12 col-md-4 p-5 mt-3">
                    <img class="rounded-circle img-fluid border" src="{{ url('/uploads') }}/{{ $topCat->image }}"
                        alt="">
                    <h5 class="text-center mt-3 mb-3">{{ $topCat->name }}</h5>
                    <p class="text-center"><a href="{{ route('category.detail', $topCat->id) }}" class="btn btn-success">Xem
                            Ngay</a></p>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản Phẩm Nổi Bật</h1>
                    <p>
                        "Bao gồm những sản phẩm bán chạy nhất và những sản phẩm được review đánh giá cao nhất"
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($topProduct as $product)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('product.detail', $product->id) }}">
                                <img src="{{ url('/uploads') }}/{{ $product->image }}" class="card-img-top"
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                    </li>
                                    <li class="text-danger text-right">
                                        <p><b>{{ number_format($product->sale_price ? $product->sale_price : $product->price) }}<sup>vnđ</sup></b>
                                        </p>
                                    </li>
                                </ul>
                                <a href="{{ route('product.detail', $product->id) }}"
                                    class="h2 text-decoration-none text-dark"><b>{{ Str::words($product->name, 5) }}</b></a>

                                <div class="row pt-5">
                                    <div class="col d-grid">
                                        <a class="btn btn-success"
                                            href="{{ route('product.detail', [$product->id, Str::slug($product->name)]) }}">
                                            Xem
                                            chi tiết</a>
                                    </div>
                                    <div class="col d-grid">
                                        <a class="btn btn-success cart-add"
                                            href="{{ route('cart.add', $product->id) }}">Thêm
                                            vào
                                            giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    <!-- Start blog post -->
    <section class="">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="m-auto">
                    <h1 class="h1">Tin Mới</h1>
                    <p>
                        "Cập nhật tin tức về các sản phẩm phụ kiện Unisex"
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="card text-left">
                            <a  style="text-decoration: none" href="{{ route('blog.detail', $blog->id) }}">
                                <img class="card-img-top img-fluid" src="{{ url('/uploads') }}/{{ $blog->avatar }}"
                                    width="100%">
                                <div class="card-body">
                                    <h4 class="card-title text-dark">{{ $blog->name }}</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End blog post -->


@stop()

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::get('true'))
        <script>
            Swal.fire({
                position: 'mid-center',
                icon: 'success',
                title: '{{ Session::get('true') }}',
                showConfirmButton: true,
                timer: 3500
            })
        </script>
    @endif

@stop()
