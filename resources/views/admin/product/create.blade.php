@extends('master.admin')

@section('title', 'Tạo Mới Sản Phẩm')

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Nhập tên sản phẩm ...">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" class="form-control" name="thumbnail[]" multiple>
                        @error('images')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea class="form-control description" name="description" rows="5" placeholder="Mô tả sản phẩm ...">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Giá Bán</label>
                        <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                            placeholder="Nhập giá sản phẩm ...">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Giá Khuyến Mại</label>
                        <input type="number" class="form-control" name="sale_price" value="{{ old('sale_price') }}"
                            placeholder="Nhập giá khuyến mại ...">
                        @error('sale_price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Chất Liệu</label>
                        @foreach ($materials as $material)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="material_id[]" value="{{ $material->id }}" />
                                    {{ $material->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>

                    <div class=" form-group">
                        <label for="">Danh Mục</label>
                        <select class="form-control" name="category_id">
                            <option>Chọn 1</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Trạng Thái</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="1" checked>
                                Hiển thị
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="0">
                                Tạm ẩn
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-success">Thêm Sản Phẩm</button>
                </div>
            </div>
        </form>
    </div>
@stop()


@section('js')


@stop()
