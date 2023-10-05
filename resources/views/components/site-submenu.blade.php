@if(Route::currentRouteName() == 'site.index')
<h3 class="sub--menu__title pt-4">PRODUCT OVERVIEW</h3>
@endif
<div class="row sub--menu pt-4">
    <div class="sub--menu--left d-flex col-md-8 col-sm-12">
        <ul class="d-flex flex-w flex-l-m">
            <li><a class="text-decoration-none" href="{{ route('site.shop') }}">All Products</a></li>
            @foreach($cat_global as $cat)
            <li>
                <a class="text-decoration-none" href="{{route('category.detail',[$cat->id, Str::slug($cat->name)])}}">{{$cat->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="sub--menu--right d-flex col-md-4 col-sm-12 justify-content-end">
        @if(Route::currentRouteName() != 'site.index')
        <div class="btn navbar-toggler display__modal d-flex flex-c-m product__filter" data-toggle="collapse" data-target="#collapsibleFilter" aria-controls="collapsibleFilter"
                    aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-filter"></i> Filter
        </div>
        @endif
        <div class="btn navbar-toggler display__modal d-flex flex-c-m product__search" data-toggle="collapse" data-target="#collapsibleSearch" aria-controls="collapsibleSearch"
                    aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-search"></i> Search
        </div>
    </div>
</div>
<div class="col-12 modal--search collapse navbar-collapse" id="collapsibleSearch">
    <form action="{{route('site.search')}}" method="get" class="form-inline search--form">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" class="" name="keyword" aria-describedby="helpId"
            placeholder="search">
</form>
</div>
<div class="col-12 modal--filter collapse navbar-collapse" id="collapsibleFilter">
    <div class="row">
        <div class="col-md-3 col-sm-12 filter--orderby">
            <h6>Sort by</h6>
            <ul>
                <li><a href="?orderby=created_at&sort=DESC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Date: new - old</a></li>
                <li><a href="?orderby=created_at&sort=ASC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Date: old - new</a></li>
                <li><a href="?orderby=name&sort=ASC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Name: a - z</a></li>
                <li><a href="?orderby=name&sort=DESC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Name: z - a</a></li>
                <li><a href="?orderby=price&sort=DESC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Price: low - hight</a></li>
                <li><a href="?orderby=price&sort=ASC&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">Price: hight - low</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-12 filter--price">
            <h6>Price</h6>
            <ul>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=0&to=99999999&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">All</a></li>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=0&to=50&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">$0.00 - $50.00</a></li>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=50&to=100&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">$50.00 - $100.00</a></li>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=100&to=150&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">$100.00 - $150.00</a></li>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=1500&to=200&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">$150.00 - $200.00</a></li>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from=200&to=9999999&color={{request('color','')}}&size={{request('size','')}}&keyword={{request('keyword')}}">$200.00+</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-12 filter--color">
            <h6>Color</h6>
            <ul>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from={{request('from', 0)}}&to={{request('to',0)}}&color=&size={{request('size','')}}&keyword={{request('keyword')}}">All</a>
                </li>
                @foreach ($color_global as $color)
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from={{request('from', 0)}}&to={{request('to',0)}}&color={{$color->name}}&size={{request('size','')}}&keyword={{request('keyword')}}"><span style="background: {{ $color->slug }};"></span> {{ $color->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-3 col-sm-12 filter--size">
            <h6>Size</h6>
            <ul>
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size=&keyword={{request('keyword')}}">All</a>
                </li>
                @foreach ($size_global as $size)
                <li><a href="?orderby={{request('sortby','id')}}&sort={{request('sort','DESC')}}&from={{request('from', 0)}}&to={{request('to',0)}}&color={{request('color','')}}&size={{$size->name}}&keyword={{request('keyword')}}">{{ $size->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>