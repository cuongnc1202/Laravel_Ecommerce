<ul class="list-unstyled">
    @foreach($cat_global as $cat)
    <li class="pb-3">
        <a class="catDetail collapsed d-flex text-success h3 text-decoration-none" href="{{route('category.detail',[$cat->id, Str::slug($cat->name)])}}"> <i class="fa fa-chevron-circle-right"></i> <b> {{$cat->name}}</b> </a>
        <hr>
    </li>
    @endforeach
</ul>
<!-- Price Start -->
<div class="border-bottom mb-4 pb-4 pr-5">
    <h5 class="font-weight-bold mb-4">LỌC THEO GIÁ</h5>
    <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}">
            <b>Tất cả</b>
        </a>
        <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}?from=0&to=1000000&keyword={{request('keyword')}}">
            <b>Dưới 1 triệu đồng</b>
        </a>
        <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}?from=1000000&to=3000000&keyword={{request('keyword')}}">
            <b>Từ 1 đến 3 triệu đồng</b>
        </a>
        <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}?from=3000000&to=5000000&keyword={{request('keyword')}}">
            <b>Từ 3 đến 5 triệu đồng</b>
        </a>
        <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}?from=5000000&to=10000000&keyword={{request('keyword')}}">
            <b>Từ 5 đến 10 triệu đồng</b>
        </a>
        <hr>
        <a class="priceFilter text-success" href="{{url()->current()}}?from=10000000&to=1000000000&keyword={{request('keyword')}}">
            <b>Trên 10 triệu đồng</b>
        </a>
        <hr>
</div>
<!-- Price End -->