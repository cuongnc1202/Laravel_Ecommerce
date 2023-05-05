@extends('master.home')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content')


    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ url('/uploads') }}/{{ $product->image }}"
                            alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">
                                <div class="carousel-item active">
                                    <div class="row">
                                        @foreach ($product->images as $thumbnail)
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="{{ url('/uploads') }}/{{ $thumbnail->name }}"
                                                        alt="Product Image 1">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>

                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1><strong><b>{{ $product->name }}</b></strong></h1>
                            <p class="h3 py-2">
                                @if ($product->sale_price > 0)
                                    <s>
                                        <p>{{ number_format($product->price) }}<sup>vnđ</sup></p>
                                    </s>
                                    <h3 class="text-danger"><b>{{ number_format($product->sale_price) }}</b><sup>vnđ</sup>
                                    </h3>
                                @else
                                    <h3 class="text-danger">{{ number_format($product->price) }}<sup>vnđ</sup></h3>
                                @endif
                            </p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Đánh giá 4.8 | 36 Phản hồi</span>
                            </p>
                            <?php
                            $attributes = [];
                            foreach ($product->materials as $item) {
                                $attributes[] = $item->material->name;
                            }
                            ?>
                            @if (count($attributes) > 0)
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Chất liệu:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <h6 class=""><strong><?php echo join(',', $attributes) ?></strong></h6>
                                    </li>
                                </ul>
                            @endif
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Danh mục:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 class=""><strong>{{ $product->category->name }}</strong></h6>
                                </li>
                            </ul>

                            <h6>Mô tả sản phẩm:</h6>
                            <p class="pb-2">
                                {!! Str::words($product->description, 100) !!}
                            </p>

                            <div class="row pb-3 pt-5">
                                <div class="col d-grid">
                                    <a href="{{ route('cart.add', $product->id) }}"
                                        class="btn btn-success btn-lg cart-add">Thêm vào
                                        giỏ hàng</a>
                                </div>
                                <div class="col d-grid"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left">
                <h1 class="text-dark text-center"><b>Sản Phẩm Liên Quan</b></h1>
            </div>
        </div>
        <div class="div bg-light">
            <div class="container">
                <div class="row related-product py-5">
                    @foreach ($relatedProduct as $prod)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <a href="" style="text-decoration: none;">
                                <div class="card text-left">
                                    <img class="card-img-top" src="{{ url('/uploads') }}/{{ $prod->image }}"
                                        alt="">
                                    <div class="card-body">
                                        <h3 class="card-title text-dark pb-3">{{ Str::words($prod->name, 5) }}</h3>
                                        <ul class="list-unstyled d-flex justify-content-between">
                                            <li class="text-dark text-right">
                                                <p><s>{{ number_format($product->price) }}<sup>vnđ</sup></s>
                                                </p>
                                            </li>
                                            <li class="text-danger text-right">
                                                <h4><b>{{ number_format($product->sale_price ? $product->sale_price : $product->price) }}<sup>vnđ</sup></b>
                                                </h4>
                                            </li>
                                        </ul>
                                        <hr>
                                    </div>
                                    <div class="row px-2 py-2">
                                        <div class="col d-grid">
                                            <a class="btn btn-success text-white"
                                                href="{{ route('product.detail', $prod->id) }}"
                                                style="text-decoration: none;">Xem chi tiết</a>
                                        </div>
                                        <div class="col d-grid">
                                            <a class="btn btn-success text-white" href=""
                                                style="text-decoration: none;">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Article -->
@stop()
