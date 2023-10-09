jQuery(document).ready(function ($) {

    function cartCallAjax(link, message) {
        $.ajax({
            url: link,
            type: 'get',
            success: function () {
                $('#cart-number').load(location.href + ' #cart-number > *');
                $('#cart').load(location.href + ' #cart > *');
                $.toast({
                    heading: 'Alert',
                    text: message,
                    position: 'top-center',
                    icon: 'success',
                });
            }
        });
    }
    $('.cart-add').click(function (ev) {
        ev.preventDefault();
        var _url = $(this).attr('href');
        $('#modal-cart').modal()
        cartCallAjax(_url, 'Success')
    });

    $(document).on('click', '.delete-product', function (ev) {
        ev.preventDefault();
        var _url1 = $(this).attr('href');
        cartCallAjax(_url1, 'Success')

    });

    $(document).on('click', '.btn-minus', function (ev) {
        ev.preventDefault();
        var _id = $(this).data('id');
        var _quantity = $('input.quantity-' + _id).val();
        var newQuantity = _quantity > 1 ? _quantity - 1 : 1;
        var _url2 = $(this).data('url') + '/?quantity=' + newQuantity;
        $('input.quantity-' + _id).val(newQuantity);
        cartCallAjax(_url2, 'Success')

    });

    $(document).on('click', '.btn-plus', function (ev) {
        ev.preventDefault();
        var _id = $(this).data('id');
        var _quantity = $('input.quantity-' + _id).val();
        var newQuantity = parseInt(_quantity) + 1;
        var _url3 = $(this).data('url') + '/?quantity=' + newQuantity;
        $('input.quantity-' + _id).val(newQuantity);
        cartCallAjax(_url3, 'Success')

    });

    $('#thumbnailCarousel').owlCarousel({
        items: 3,
        nav: true,
        margin: 35,
        loop: true,
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            640: {
                items: 3
            },
            768: {
                items: 3
            },
            1024: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true
    });

    var windowH = $(window).height() / 2;

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display', 'flex');
        } else {
            $("#myBtn").css('display', 'none');
        }
    });

    $('#myBtn').on("click", function () {
        $('html, body').animate({ scrollTop: 0 }, 300);
    });

})