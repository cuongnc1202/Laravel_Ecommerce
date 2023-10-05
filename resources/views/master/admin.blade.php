<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('/assets') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('/assets') }}/css/adminlte.css">
    <link rel="stylesheet" href="{{ url('/assets') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ url('/assets') }}/plugins/summernote/summernote.min.css">

    @yield('css')

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <x-admin-nav/>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{url('/assets')}}/img/user3-128x128.jpg" class="img-circle elevation-2" width="50">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <!-- Sidebar -->
            <x-admin-aside />
            <!-- sidebar -->
        </aside>

        <div class="content-wrapper px-5">  
            <h1 class="text-center text-dark py-2"><b>@yield('title')</b></h1>
            <section class="content">
                <div class="card py-5">
                    @yield('content')
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
            <strong>Copyright &copy; 2014-2019 All rights reserved.
        </footer>
    </div>

    <script src="{{ url('/assets') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/toastr/toastr.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/summernote/summernote.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/assets') }}/js/adminlte.min.js"></script>
    <script src="{{ url('/assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (Session::get('true'))
    <script>
        Swal.fire({
        position: 'mid-center',
        icon: 'success',
        title: '{{ Session::get("true")}}',
        showConfirmButton: true,
        timer: 3500
        })
    </script>
@endif

@if (Session::get("false"))
    <script>
        Swal.fire({
        position: 'mid-center',
        icon: 'error',
        title: '{{ Session::get("false")}}',
        showConfirmButton: true,
        timer: 3500
        })
    </script>
@endif
    <script>
        $('.description').summernote({
            height: 250,
        });

        $('.short_description').summernote({
            height: 100,
        })
    </script>
@yield('js')
</body>

</html>
