 @extends('master.home')

 @section('title', 'Shop')

 @section('content')

 <!-- Start Content -->
 <div class=" bg-light">
     <div class="container py-5">
         <div class="row">
             <div class="col-xl-3 col-md-4 col-sm-12 pr-5 category">
                 <x-site-category />
             </div>
             <div class="col-xl-9  col-md-8 col-sm-12">
                 <div class="row" id="productList">
                     @forelse ($product as $data)
                     <div class="col-xl-4 col-md-12 col-sm-12 mb-4">
                         <div class="card h-100">
                             <a href="{{ route('product.detail', $data->id) }}">
                                 <img src="{{ url('/uploads') }}/{{ $data->image }}" class="card-img-top" alt="...">
                             </a>
                             <div class="card-body">
                                 <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="text-dark text-right">
                                        <p><s>{{ number_format($data->price) }}<sup>vnđ</sup></s>
                                        </p>
                                    </li>
                                     <li class="text-danger text-right">
                                         <h4><b>{{ number_format($data->sale_price ? $data->sale_price : $data->price) }}<sup>vnđ</sup></b>
                                         </h4>
                                     </li>
                                 </ul>
                                 <hr>
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
                 </div>
                 {{ $product->links() }}
             </div>
         </div>
     </div>
 </div>
 <!-- End Content -->

 @stop()
