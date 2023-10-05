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
    <section class="bg-light product__detail">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-6 col-md-12 mt-5 product--image">
                    <div class="row">
                        <div class="slider slider-nav col-3">
                            @forelse ($product->images as $image)
                            <div class="item">
                                <img class="card-img img-fluid"
                                    src="{{ url('/uploads') }}/{{ $image->name }}"
                                    alt="Product Image {{ $loop->index += 1}}">
                            </div>
                            @empty
                            <div class="item">
                                <img class="card-img img-fluid"
                                    src="{{ url('/uploads') }}/{{ $product->feature_image }}"
                                    alt="Product Image 1">
                            </div>
                            @endforelse
                        </div>
                        <div class="slider slider-for col-9">
                            @forelse ($product->images as $image)
                            <div class="item">
                                <img class="card-img img-fluid"
                                    src="{{ url('/uploads') }}/{{ $image->name }}"
                                    alt="Product Image {{ $loop->index += 1}}">
                            </div>
                            @empty
                            <div class="item">
                                <img class="card-img img-fluid"
                                    src="{{ url('/uploads') }}/{{ $product->feature_image }}"
                                    alt="Product Image 1}}">
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h2><strong><b>{{ $product->name }}</b></strong></h2>
                            <p class="h3 py-2">
                                @if ($product->sale_price > 0)
                                    <div class="product--price d-flex">
                                        <s> ${{ $product->price }} </s>
                                        <span class="px-2">-</span>
                                        <h3 class="text-danger">${{ $product->sale_price }}
                                        </h3>
                                    </div>
                                @else
                                    <div class="product--price d-flex">
                                        <h3 class="text-danger">${{ $product->price }}</h3>
                                    </div>
                                @endif
                            </p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <!-- <span class="list-inline-item text-dark">Đánh giá 4.8 | 36 Phản hồi</span> -->
                            </p>
                            
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <b>
                                        <a href="{{ route('category.detail', $product->category->id) }}">{{ $product->category->name }}</a>
                                    </b>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                                @if($product->short_description)
                                <span>{{ $product->short_description }}</span>
                                @else
                                <span>{!! Str::words($product->description, 50) !!}</span>
                                @endif
                            <form action="{{ route('cart.add', $product->id) }}" method="get">
                                @csrf    
                                <div class="row pb-2 mt-5">
                                    <div class="col-md-6 col-sm-6 col-xs-12 product--size">
                                        <div class="form-group d-flex">
                                            <label class="mb-0  mr-2" for=""><h6 class="mb-0">Size: </h6></label>
                                            <select class="form-control" name="cart_size" id="">
                                                <option>Choose 1</option>
                                                @foreach($product->sizes as $size)
                                                <option value="{{ $size->size->name }}">{{ $size->size->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <button class="btn btn-success cart-btn">Add to cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product__description py-5">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#review" role="tab" data-toggle="tab">Reviews</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-5">
                <div role="tabpanel" class="tab-pane show fade in active" id="description">
                    {{ $product->description }}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="review">bbb</div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="relate__product bg-light pt-4">
        <div class="container">
            <div class="row section__title">
                <h3 class="text-dark text-center mt-2"><b>Related Product</b></h3>
            </div>
        </div>
        <div class="div bg-light">
            <div class="container">
                <div class="row related--product py-5">
                    @foreach ($relatedProduct as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product__list__item">
                        <div class="content--box">
                            <div class="product__image col-12">
                                <img class="img-fluid" src="{{ url('/uploads') }}/{{$product->feature_image}}" alt="">
                                <div class="quick--view text-center">
                                    <button class="btn btn-quick-view"data-toggle="modal" data-target="#modal-quick-view-{{$product->id}}">Quick view</button>
                                    <a href="{{ route('product.detail', $product->id) }}"
                                            class="btn">View detail</a>
                                </div>
                            </div>
                            <div class="product__info col-12 pt-2">
                                <a class="product__name h6" href="{{route('product.detail',[$product->id, Str::slug($product->name)])}}"><span>{{$product->name}}</span>
                                <div class="product__price d-flex">
                                    @if($product->sale_price != 0)
                                    <s>${{$product->price}}</s>
                                    <b>${{$product->sale_price}}</b>
                                    @else
                                    <b>${{$product->price}}</b>
                                    @endif
                                </div>
                                </a>
                            </div>
                            <div class="modal fade" id="modal-quick-view-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12 product--image">
                                                    <div class="row">
                                                        <div class="slider slider-nav col-3">
                                                            @forelse ($product->images as $image)
                                                            <div class="item">
                                                                <img class="card-img img-fluid"
                                                                    src="{{ url('/uploads') }}/{{ $image->name }}"
                                                                    alt="Product Image {{ $loop->index += 1}}">
                                                            </div>
                                                            @empty
                                                            <div class="item">
                                                                <img class="card-img img-fluid"
                                                                    src="{{ url('/uploads') }}/{{ $product->feature_image }}"
                                                                    alt="Product Image 1">
                                                            </div>
                                                            @endforelse
                                                        </div>
                                                        <div class="slider slider-for col-9">
                                                            @forelse ($product->images as $image)
                                                            <div class="item">
                                                                <img class="card-img img-fluid"
                                                                    src="{{ url('/uploads') }}/{{ $image->name }}"
                                                                    alt="Product Image {{ $loop->index += 1}}">
                                                            </div>
                                                            @empty
                                                            <div class="item">
                                                                <img class="card-img img-fluid"
                                                                    src="{{ url('/uploads') }}/{{ $product->feature_image }}"
                                                                    alt="Product Image 1}}">
                                                            </div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-sm-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h2><strong><b>{{ $product->name }}</b></strong></h2>
                                                            <p class="h3 py-2">
                                                                @if ($product->sale_price > 0)
                                                                <div class="product--price d-flex">
                                                                    <s> ${{ $product->price }} </s>
                                                                    <span class="px-2">-</span>
                                                                    <h3 class="text-danger">${{ $product->sale_price }}
                                                                    </h3>
                                                                </div>
                                                                @else
                                                                <div class="product--price d-flex">
                                                                    <h3 class="text-danger">${{ $product->price }}</h3>
                                                                </div>
                                                                @endif
                                                            </p>
                                                            <p class="py-2">
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-secondary"></i>
                                                            </p>
                                                            
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <h6>Category:</h6>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <b>
                                                                        <a href="{{ route('category.detail', $product->category->id) }}">{{ $product->category->name }}</a>
                                                                    </b>
                                                                </li>
                                                            </ul>

                                                            <h6>Description:</h6>
                                                                @if($product->short_description)
                                                                {{ $product->short_description }}
                                                                @else
                                                                {!! Str::words($product->description, 50) !!}
                                                                @endif
                                                            <form action="{{ route('cart.add', $product->id) }}" method="get">
                                                                <div class="row pb-2 mt-5">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 product--size">
                                                                        <div class="form-group d-flex">
                                                                            <label class="mb-0  mr-2" for=""><h6 class="mb-0">Size: </h6></label>
                                                                            <select class="form-control" name="cart_size" required>
                                                                                <option value="">Choose 1</option>
                                                                                @foreach($product->sizes as $size)
                                                                                <option value="{{ $size->size->name }}">{{ $size->size->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                                        <button class="btn btn-success">Add to cart</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Article -->
@stop()
