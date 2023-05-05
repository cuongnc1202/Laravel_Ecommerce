@extends('master.home')

@section('title', 'Liên Hệ')

@section('content')

    <!-- Modal -->

    <!-- Start Content Page -->
    <div class="container-fluid bg-success py-5 text-white">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1"><b>Form Liên Hệ</b></h1>
            <p>
                Hãy cho chúng tôi biết bạn cần hỗ trợ những gì!
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
                        <label for="inputname"><b>Họ Tên</b></label>
                        <input type="text" class="form-control mt-1" name="name" placeholder="tên đầy đủ ...">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><b>Email</b></label>
                        <input type="email" class="form-control mt-1" name="email" placeholder="nhập địa chỉ email ...">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname"><b>Số Điện Thoại</b></label>
                        <input type="number" class="form-control mt-1" name="phone" placeholder="tên số điện thoại ...">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail"><b>Địa Chỉ</b></label>
                        <input type="text" class="form-control mt-1" name="address" placeholder="nhập địa chỉ...">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputtitle"><b>Chủ Đề</b></label>
                    <input type="text" class="form-control mt-1" name="title" placeholder="nhập chủ đề ...">
                </div>
                <div class="mb-3">
                    <label for="inputdescription"><b>Nội Dung</b></label>
                    <textarea class="form-control mt-1" name="description" placeholder="nhập tin nhắn ..." rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Gửi</button>
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
