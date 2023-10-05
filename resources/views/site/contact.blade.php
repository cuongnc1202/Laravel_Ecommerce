@extends('master.home')

@section('title', 'Contact Us')

@section('content')

    <!-- Modal -->

    <!-- Start Content Page -->
    <div class="container-fluid bg-success py-5 text-white">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1"><b>Contact Us</b></h1>
            <p>
                Let us know what support you need!
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row ">
            <form class="col-md-9 m-auto" method="post" role="form">
                @csrf @method('POST')
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname"><b>First name</b></label>
                        <input type="text" class="form-control mt-1" name="first_name" placeholder="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname"><b>Last name</b></label>
                        <input type="text" class="form-control mt-1" name="last_name" placeholder="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><b>Email</b></label>
                        <input type="email" class="form-control mt-1" name="email" placeholder="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname"><b>Phone</b></label>
                        <input type="number" class="form-control mt-1" name="phone" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mb-3">
                        <label for="inputemail"><b>Address</b></label>
                        <input type="text" class="form-control mt-1" name="address" placeholder="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputtitle"><b>Topic</b></label>
                    <input type="text" class="form-control mt-1" name="title" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="inputdescription"><b>Message</b></label>
                    <textarea class="form-control mt-1" name="description" placeholder="" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success mb-3 px-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->



@stop()

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::get('true'))
        <script>
            Swal.fire({
                position: 'mid-center',
                icon: 'success',
                title: '{{ Session::get('true') }}',
                showConfirmButton: true,
                timer: 3500
            })
        </script>
    @endif

    @if (Session::get('false'))
        <script>
            Swal.fire({
                position: 'mid-center',
                icon: 'success',
                title: '{{ Session::get('false') }}',
                showConfirmButton: true,
                timer: 3500
            })
        </script>
    @endif

@stop()
