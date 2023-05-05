@extends('master.home')

@section('title', 'Danh mục: ' . $category->name)

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
                    <input type="text" class="form-control" name="keyword" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Content -->
    <div class="content   bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-12 category">
                    <x-site-category />
                </div>
                <div class="col-xl-9 col-md-8 col-sm-12">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="row pt-4">
                                @forelse ($products as $data)
                                    <div class="col-xl-4 col-md-12 col-sm-12 mb-4">
                                        <div class="card h-100">
                                            <a href="{{ route('product.detail', $data->id) }}">
                                                <img src="{{ url('/uploads') }}/{{ $data->image }}" class="card-img-top"
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
                                                        <p><b>{{ number_format($data->sale_price ? $data->sale_price : $data->price) }}<sup>vnđ</sup></b>
                                                        </p>
                                                    </li>
                                                </ul>
                                                <a href="{{ route('product.detail', $data->id) }}"
                                                    class="h2 text-decoration-none text-dark"><b>{{ Str::words($data->name, 5) }}</b></a>
                                                <div class="row pt-2 pb-2">
                                                    <div class="col d-grid">
                                                        <a class="btn btn-success btn-property"
                                                            href="{{ route('product.detail', $data->id) }}"><i
                                                                class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="col d-grid">
                                                        <a class="btn btn-success cart-add"
                                                            href="{{ route('cart.add', $data->id) }}"><i
                                                                class="fa fa-cart-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-danger text-center" role="alert">
                                        <strong>Không tìm thấy sản phẩm phù hợp, thử lại ...</strong>
                                    </div>
                                @endforelse
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Content -->
@stop()
