<!doctype html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ url('/assets') }}/build/css/login-style.css">
    <style>
        .login-form {
            width: 500px;
            margin: auto;
            margin-top: 100px;
        }
        body {
            background-image: url(https://kiemtientuweb.com/ckfinder/userfiles/images/background-dep/background-dep-23.jpg)

        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="login-form bg-light">
        <form action="#" method="post" class="py-5 px-5">
            @csrf
            <div class="form-group my-4">
                <label for="">Tài khoản:</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Nhập tên tài khoản ...">
            </div>
            <div class="form-group my-4">
                <label for="">Mật khẩu:</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu ...">
            </div>
            <div class="form-check my-4">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input" name="remember">
                    Lưu tài khoản
                </label>
            </div>
            @if (Session::has('false'))
            <div class="alert alert-primary" role="alert">
                <strong>{{Session::get('false')}}</strong>
            </div>
            @endif
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-info btn-lg mt-5">ĐĂNG NHẬP</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
