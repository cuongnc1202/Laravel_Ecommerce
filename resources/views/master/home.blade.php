<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ url('/assets') }}/plugins/toast/dist/jquery.toast.min.css">
      <link rel="stylesheet" href="{{ url('/assets') }}/plugins/OwlCarousel/dist/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ url('/assets') }}/plugins/OwlCarousel/dist/assets/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
      <link rel="stylesheet" href="{{ url('/site') }}/css/custom.css">
      @yield('css')
      <link rel="stylesheet"
         href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
      <link rel="stylesheet" href="{{ url('/site') }}/css/fontawesome.min.css">
   </head>
   <body>
      <!-- Header -->
      <section class="header">
         <div class="header--top bg-dark">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-sm-12 header--top__left">
                     <i class="fa fa-envelope mr-2"></i>
                     <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@chipstore.com">info@cuongstore.com</a>
                     <i class="fa fa-phone mx-2"></i>
                     <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0858.030.444">0858.030.444</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="header--bottom shadow">
            <div class="container">
               <div class="row">
                  <div class="col-lg-10 col-md-9 col-sm-8 header--bottom--left">
                     <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand logo h2 align-self-center" href="{{ route('site.index') }}">
                        CuongNC Store
                        </a>
                        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                           aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                           <ul class="navbar-nav mr-auto mt-2 mt-lg-0 menu--main">
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('site.index') }}">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('site.shop') }}">Shop</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('blog.list') }}">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('site.about') }}">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('site.contact') }}">Contact</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 header--bottom--right">
                     @if (auth('customer')->check())
                     <ul class="navbar-nav">
                        <li class="dropdown user user-menu">
                           <a href="#" style="text-decoration: none" class="dropdown-toggle text-dark"
                              data-toggle="dropdown">
                           <span class="hidden-xs "><b><i class="fa fa-user"></i>
                           {{ auth('customer')->user()->last_name }}</b></span>
                           </a>
                           <ul class="dropdown-menu bg-light" id="userDropdown">
                              <li class="user-footer bg-light text-left">
                                 <a href="{{ route('update.user') }}" class="btn btn-default btn-flat">Update profile</a>
                              </li>
                              <li class="user-footer bg-light text-left">
                                 <a href="{{ route('order.history') }}" class="btn btn-default btn-flat">Order history</a>
                              </li>
                              <li class="user-footer bg-light text-left">
                                 <a href="{{ route('update.password') }}" class="btn btn-default btn-flat">Change password</a>
                              </li>
                              <li class="user-footer bg-light text-left">
                                 <a href="{{ route('site.logout') }}" class="btn btn-default btn-flat">Logout</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                     @else
                     <ul class="navbar-nav">
                     <li class="dropdown user user-menu">
                     <a href="#" style="text-decoration: none" class="dropdown-toggle text-dark"
                              data-toggle="dropdown">
                           <span class="hidden-xs "><b><i class="fa fa-user"></i>
                           Account</b></span>
                           </a>
                     <ul class="dropdown-menu bg-light" id="userDropdown">
                              <li class="user-footer bg-light text-left">
                                 <a class="btn btn-default btn-flat text-dark d-flex" href="{{ route('site.login') }}"><i
                                     class="fa fa-user mr-1"></i>Login</a>
                              </li>
                              <li class="user-footer bg-light text-left">
                              <a class="btn btn-default btn-flat text-dark d-flex" href="{{ route('site.register') }}"><i
                                     class="fa fa-user mr-1"></i>Register</a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                     @endif
                     <a class="nav-icon position-relative text-decoration-none" id="cart-number"
                        href="{{ route('cart.view') }}">
                     <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1">
                     </i>
                     <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-white">{{ $cart->getTotalQuantity() }}</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Close Header -->
      @yield('content')
      <!-- Modal Cart-->
      <div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
         <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Your Cart</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="cart">
                  <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                        <tr>
                           <th style="width: 5%">No</th>
                           <th style="width: 20%">Name</th>
                           <th>Image</th>
                           <th style="width: 5%">Size</th>
                           <th style="width: 25%">Quantity</th>
                           <th style="width: 20%">Price</th>
                           <th style="width: 20%">Total</th>
                           <th style="width: 5%">Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($cart->items as $product)
                        <tr>
                           <td scope="row">{{ $loop->index += 1 }}</td>
                           <td scope="row">{{ $product['name'] }}</td>
                           <td scope="row"><img src="{{ url('uploads') }}/{{ $product['image'] }}" width="80"></td>
                           <td scope="row">{{ $product['cart_size'] }}</td>
                           <td>
                              <form action="{{ route('cart.update', $product['id']) }}" class="form-inline"
                                 method="get">
                                 <button style="width: 50px;" type="submit"
                                    data-url="{{ route('cart.update', $product['id']) }}"
                                    data-id="{{ $product['id'] }}" class="btn-danger btn-minus"><i
                                    class="fa fa-minus"></i></button>
                                 <input style="width: 50px;" type="number" name="quantity"
                                    class="quantity-{{ $product['id'] }}" value="{{ $product['quantity'] }}">
                                 <button style="width: 50px;" type="submit"
                                    data-url="{{ route('cart.update', $product['id']) }}"
                                    data-id="{{ $product['id'] }}" class="btn-success btn-plus"><i
                                    class="fa fa-plus"></i></button>
                              </form>
                           </td>
                           <td>${{ ($product['sale_price'] ? $product['sale_price'] : $product['price']) }}
                           </td>
                           <td>${{ ($product['quantity'] * ($product['sale_price'] ? $product['sale_price'] : $product['price'])) }}
                           </td>
                           <td>
                              <a class="btn delete-product btn-danger"
                                 href="{{ route('cart.delete', $product['id']) }}"><i
                                 class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                        <tr>
                           <th style="text-align: right; padding-right: 30px">
                              <h2>Cart total: ${{ ($cart->getTotalPrice()) }}</h2>
                           </th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Return shop</button>
                  <a href="{{ route('order.checkout') }}" type="button" class="btn btn-primary">Continue order</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Start Footer -->
      <footer class="bg-dark text-light footer">
         <div class="container">
            <div class="row footer--top">
               <div class="col-lg-3 col-md-6 col-xs-12">
                  <h4 class="block__title">Categories</h4>
                  <ul>
                     @foreach($cat_global as $category)
                     <li>
                        <a class="text-decoration-none"
                           href="{{ route('category.detail', [$category->id, Str::slug($category->name)]) }}">{{ $category->name }}
                        </a>
                     </li>
                     @endforeach
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 col-xs-12">
                  <h4 class="block__title">Help</h4>
                  <ul>
                     <li><a href="">Track Order</a></li>
                     <li><a href="">Return</a></li>
                     <li><a href="">Shipping</a></li>
                     <li><a href="">FAQs</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 col-xs-12">
                  <h4 class="block__title">Contact</h4>
                  <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                  <ul>
                     <li><a href=""><i class="fa fa-facebook"></i></a></li>
                     <li><a href=""><i class="fa fa-twitter"></i></a></li>
                     <li><a href=""><i class="fa fa-instagram"></i></a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 col-xs-12">
                  <h4 class="block__title">Newsletter</h4>
                  <form action="#" method="post">
                     <div class="form-group">
                        <input type="text"
                           class="form-control" name="subcribe_email" id="" aria-describedby="helpId" placeholder="email@example.com">
                     </div>
                     <div class="subcribe">
                        <button class="btn btn-light">Subcribe</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row footer--bottom">
               <div class="col-12 payment">
                  <ul>
                     <li><a href=""><img src="{{ url('/site') }}/images/icon-pay-01.png" alt=""></a></li>
                     <li><a href=""><img src="{{ url('/site') }}/images/icon-pay-02.png" alt=""></a></li>
                     <li><a href=""><img src="{{ url('/site') }}/images/icon-pay-03.png" alt=""></a></li>
                     <li><a href=""><img src="{{ url('/site') }}/images/icon-pay-04.png" alt=""></a></li>
                     <li><a href=""><img src="{{ url('/site') }}/images/icon-pay-05.png" alt=""></a></li>
                  </ul>
               </div>
               <div class="col-12 copyright">
                  <p>Copyright ©2023 All rights reserved | Made with <i class="fa fa-heart"></i> by <a href="">CuongNC</a></p>
               </div>
            </div>
         </div>
         <div class="btn back--top d-flex" id="myBtn">
            <span class="px-2 py-1">
            <i class="fa fa-chevron-up"></i>
            </span>
         </div>
      </footer>
      <!-- End Footer -->
      <!-- Start Script -->
      <script src="{{ url('/site') }}/js/jquery-1.11.0.min.js"></script>
      <script src="{{ url('/site') }}/js/jquery-migrate-1.2.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="{{ url('/assets') }}/plugins/OwlCarousel/dist/owl.carousel.min.js"></script>
      <script src="{{ url('/assets') }}/plugins/toast/dist/jquery.toast.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
      <script src="{{ url('/site') }}/js/custom.js"></script>
      @yield('js')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @if (Session::get('true'))
         <script>
            Swal.fire({
                  position: 'mid-center',
                  icon: 'success',
                  title: '{{ Session::get('true') }}',
                  showConfirmButton: true,
                  timer: 1500
            })
         </script>
      @endif

      @if (Session::get('false'))
         <script>
            Swal.fire({
                  position: 'mid-center',
                  icon: 'false',
                  title: '{{ Session::get('false') }}',
                  showConfirmButton: true,
                  timer: 1500
            })
         </script>
      @endif
      <!-- End Script -->
   </body>
</html>