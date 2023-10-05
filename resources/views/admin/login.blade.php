<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ url('/assets') }}/css/admin-login.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="login--form">
        <form action="#" method="post">
            @csrf
            <h3 class="text-center text-info">Admin Login</h3>
            <div class="form-group my-4">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="">
            </div>
            <div class="form-check my-4">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input" name="remember">
                    Remember
                </label>
            </div>
            @if (Session::has('false'))
            <div class="alert alert-primary" role="alert">
                <strong>{{Session::get('false')}}</strong>
            </div>
            @endif
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-info mt-5">Login</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
</body>

</html>
