<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('site/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('site/assets') }}/css/templatemo.css">
    <link rel="stylesheet" href="{{ url('site/assets') }}/css/custom.css">
    <link rel="stylesheet" href="{{ url('/assets') }}/plugins/toast/dist/jquery.toast.min.css">
    @yield('css')

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ url('site/assets') }}/css/fontawesome.min.css">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@chipstore.com">info@chipstore.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0858.030.444">0858.030.444</a>
                </div>
                <div>
                    <div class="header__top__right__auth">
                        @if (auth('customer')->check())
                        <ul class="navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" style="text-decoration: none" class="dropdown-toggle text-light"
                                    data-toggle="dropdown">
                                    <span class="hidden-xs "><b><i class="fa fa-user"></i>
                                            {{ auth('customer')->user()->name }}</b></span>
                                </a>
                                <ul class="dropdown-menu bg-light">
                                    <li class="user-footer bg-light text-left">
                                        <a href="{{ route('update.user') }}" class="btn btn-default btn-flat">Cập
                                            nhật profile</a>
                                        <a href="{{ route('order.history') }}" class="btn btn-default btn-flat">Lịch
                                            sử mua hàng</a>
                                        <a href="{{ route('update.password') }}" class="btn btn-default btn-flat">Đổi
                                            mật khẩu</a>
                                        <a href="{{ route('site.logout') }}" class="btn btn-default btn-flat">Đăng
                                            xuất</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @else
                        <a class="text-white" href="{{ route('site.register') }}"><b>Đăng ký</b></a>
                        <a class="text-white" href="{{ route('site.login') }}"><i
                                class="fab fa-instagram fa-sm fa-fw me-2"></i><b>Đăng nhập</b></a>
                        @endif
                    </div>
                </div>
            </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('site.index') }}">
                Chip Store
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.index') }}">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.shop') }}">Sản Phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.list') }}">Tin Tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.contact') }}">Liên Hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="navbar align-self-center d-flex">
                    @if (Route::currentRouteName() != 'site.blog')
                    <!-- Button trigger modal -->
                    <a type="button" class="btn" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tìm kiếm sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="{{route('site.shop')}}" method="get" class="form-inline">
                                            <div class="form-group pb-5">
                                                <label for=""></label>
                                                <input type="text" class="" name="keyword" aria-describedby="helpId"
                                                    placeholder="nhập từ khóa ...">
                                                <button type="submit" class="btn btn-success btn-sm">Tìm kiếm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <a class="nav-icon position-relative text-decoration-none" id="cart-number"
                        href="{{ route('cart.view') }}">
                        Giỏ hàng <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1">
                        </i>
                        <span
                            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">{{ $cart->getTotalQuantity() }}</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    @yield('content')

    <!-- Modal -->
    <div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Giỏ hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cart">
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th style="width: 30%">Tên Sản Phẩm</th>
                                <th style="width: 25%">Số Lượng</th>
                                <th style="width: 20%">Đơn Giá</th>
                                <th style="width: 20%">Thành Tiền</th>
                                <th style="width: 5%">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->items as $product)
                            <tr>
                                <td scope="row">{{ $product['name'] }}</td>
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
                                <td>{{ number_format($product['sale_price'] ? $product['sale_price'] : $product['price']) }}
                                </td>
                                <td>{{ number_format($product['quantity'] * ($product['sale_price'] ? $product['sale_price'] : $product['price'])) }}
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
                                    <h2>Tổng tiền: {{ number_format($cart->getTotalPrice()) }} <sup>vnđ</sup></h2>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại shop</button>
                    <a href="{{ route('order.checkout') }}" type="button" class="btn btn-primary">Tiếp tục đặt
                        hàng</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 pt-5">
                    <a class="h2 text-success border-bottom pb-3 border-light logo" style="text-decoration: none"
                        href="{{ route('site.index') }}">Chip Store Shop</a>
                    <ul class="list-unstyled text-light footer-link-list pt-3">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw pt-3"></i>
                            16/8 Road 1, Beverly Hills, California.
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:0858.030.444">0858.030.444</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@chipstore.com">info@chipstore.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Danh Mục</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        @foreach ($cat_global as $cat)
                        <li><a class="text-decoration-none"
                                href="{{ route('category.detail', [$cat->id, Str::slug($cat->name)]) }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Thông Tin Thêm</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{ route('site.index') }}">Home</a></li>
                        <li><a class="text-decoration-none" href="{{ route('site.about') }}">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="{{ route('site.contact') }}">Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-auto me-auto">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank"
                                    href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <p class="text-left text-light pt-3">
                            Copyright &copy; 2023 chipstore Name
                            | Designed by <a rel="sponsored" href="https://www.facebook.com/cuongdeptrai19"
                                target="_blank">Cường Liều</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{ url('site/assets') }}/js/jquery-1.11.0.min.js"></script>
    <script src="{{ url('site/assets') }}/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ url('site/assets') }}/js/templatemo.js"></script>
    <script src="{{ url('site/assets') }}/js/custom.js"></script>
    <script src="{{ url('/assets') }}/plugins/toast/dist/jquery.toast.min.js"></script>

    <script>
    $('.cart-add').click(function(ev) {
        ev.preventDefault();
        var _url = $(this).attr('href');
        $('#modal-cart').modal()
        cartCallAjax(_url, 'Thêm sản phẩm vào giỏ hàng thành công')
    });

    $(document).on('click', '.delete-product', function(ev) {
        ev.preventDefault();
        var _url1 = $(this).attr('href');
        cartCallAjax(_url1, 'Xóa thành công sản phẩm khỏi giỏ hàng')

    });

    $(document).on('click', '.btn-minus', function(ev) {
        ev.preventDefault();
        var _id = $(this).data('id');
        var _quantity = $('input.quantity-' + _id).val();
        var newQuantity = _quantity > 1 ? _quantity - 1 : 1;
        var _url2 = $(this).data('url') + '/?quantity=' + newQuantity;
        $('input.quantity-' + _id).val(newQuantity);
        cartCallAjax(_url2, 'Cập nhật số lượng sản phẩm thành công')

    });

    $(document).on('click', '.btn-plus', function(ev) {
        ev.preventDefault();
        var _id = $(this).data('id');
        var _quantity = $('input.quantity-' + _id).val();
        var newQuantity = parseInt(_quantity) + 1;
        var _url3 = $(this).data('url') + '/?quantity=' + newQuantity;
        $('input.quantity-' + _id).val(newQuantity);
        cartCallAjax(_url3, 'Cập nhật số lượng sản phẩm thành công')

    });

    function cartCallAjax(link, message) {
        $.ajax({
            url: link,
            type: 'get',
            success: function() {
                $('#cart-number').load(location.href + ' #cart-number > *');
                $('#cart').load(location.href + ' #cart > *');
                $.toast({
                    heading: 'Thông báo',
                    text: message,
                    position: 'top-center',
                    icon: 'success',
                });
            }
        });
    }
    </script>
    @yield('js')

    <!-- End Script -->
</body>

</html>