<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ url('/site') }}/css/login-style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="login--form">
        @if(Session::has('true'))
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('true')}}</strong>
            </div>
            @endif
        @if(Session::has('false'))
            <div class="alert alert-danger" role="alert">
                <strong>{{Session::get('false')}}</strong>
            </div>
            @endif
        <form action="{{route('site.register')}}" method="post">
            @csrf
            <div class="form-group my-4">
                <label for="">First name:</label>
                <input type="text" name="first_name" class="form-control form-control-lg" placeholder="">
                @error('first_name') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Last name:</label>
                <input type="text" name="last_name" class="form-control form-control-lg" placeholder="">
                @error('last_name') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Phone:</label>
                <input type="number" name="phone" class="form-control form-control-lg" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="">Address:</label>
                <input type="text" name="address" class="form-control form-control-lg" placeholder="">
            </div>
            <div class="form-group my-4">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="">
                @error('password') {{$message}} @enderror
            </div>
            <div class="form-group my-4">
                <label for="">Retype Password:</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="">
                @error('confirm_password') {{$message}} @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success mt-3 btn--login">Register</button>
            </div>
            <div class="mt-3 text-white">
                <p>Already have an acount? <a href="{{route('site.login')}}">Login</a></p>
            </div>
            <div class="mt-3 text-right">
                <a href="{{route('site.index')}}" class="mt-3 btn btn-warning text-white">Cancel</a>
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
