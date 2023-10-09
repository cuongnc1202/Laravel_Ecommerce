@extends('master.home')

@section('title', 'Home Page')

@section('content')

    <section class="banner">
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
                        <img class="img-fluid" src="{{ url('/uploads') }}/{{ $banner->image }}" alt="">
                        <div class="banner__description">
                            <h1 class="text-white"><b>{{ $banner->name }}</b></h1>
                            {!! $banner->description !!}
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
    </section>
    <section class="category">
        <div class="container">
            <div class="row home__category">
            @foreach ($categories as $category)
            @if($loop->index < 2)
                <div class="col-md-6 col-sm-12 category__item">
                    <img class=" img-fluid border" src="{{ url('/uploads') }}/{{ $category->image }}"
                        alt="">
                    <a href="{{ route('category.detail', $category->id) }}" class="category--link">
                        <div class="category__item__info">
                            <h5 class="category__item__name">{{ $category->name }}</h5>
                            <p class="category__item__description">{{ $category->description }}</p>
                        </div>
                        <div class="btn-view-more">
                           Shop now
                        </div>
                    </a>
                </div>
            @else
                <div class="col-lg-4 col-md-6 col-sm-12 category__item">
                <img class=" img-fluid border" src="{{ url('/uploads') }}/{{ $category->image }}"
                        alt="">
                    <a href="{{ route('category.detail', $category->id) }}" class="category--link">
                        <div class="category__item__info">
                            <h5 class="category__item__name">{{ $category->name }}</h5>
                            <p class="category__item__description">{{ $category->description }}</p>
                        </div>
                        <div class="btn-view-more">
                            Shop now
                        </div>

                    </a>
                </div>
            @endif
            @endforeach
            </div>
        </div>
    </section>
    <section class="main__content">
        <div class="container">
            <x-site-submenu />
            <!-- Start Product -->
            <div class="row product__list">
                @forelse($products as $product)
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
                    </div>
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
                                                            <button class="btn btn-success cart-btn">Add to cart</button>
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
                @empty
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Sorry. We have no product yet!</strong> 
                    </div>
                    
                    <script>
                      $(".alert").alert();
                    </script>
                </div>
                @endforelse
            </div>
            <div class="view-more text-center pb-5">
                <a href="{{ route('site.shop')}}" class="btn-view-more">View more...</a>
            </div>
        </div>
    <!-- End Product -->
    </section>

@stop()

