@extends('master.admin')

@section('title', 'Chỉnh Sửa Sản Phẩm ' . $product->name)

@section('content')
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                            placeholder="Nhập tên sản phẩm ...">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" class="form-control" name="image">
                        <img class=" mt-2" src="{{ url('uploads') }}/{{ $product->image }}" width="150">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <input type="file" class="form-control" name="thumbnail[]" multiple>
                        <div class="row mt-2">
                            @foreach ($product->images as $item)
                                <div class="col-lg-2 col-md-3 col-sm-6">
                                    <div class="card  text-center">
                                        <img class="card-img-top" src="{{ url('/uploads') }}/{{ $item->name }}"
                                            width="150">
                                        <div class="card-body">
                                            <a href="{{ route('product.delete_image', $item->id) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('images')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea class="form-control description" name="description" rows="5" placeholder="Mô tả sản phẩm ...">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Giá Bán</label>
                        <input type="number" class="form-control" name="price" value="{{ $product->price }}"
                            placeholder="Nhập giá sản phẩm ...">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Giá Khuyến Mại</label>
                        <input type="number" class="form-control" name="sale_price" value="{{ $product->sale_price }}"
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
                                    <input {{ in_array($material->id, $materialIds) ? 'checked' : '' }} type="checkbox"
                                        name="material_id[]" value="{{ $material->id }}" />
                                    {{ $material->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">Danh Mục</label>
                        <select class="form-control" name="category_id">
                            <option>Chọn 1</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }} </option>
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
                                <input type="radio" class="form-check-input" name="status" value="1"
                                    {{ $product->status == 1 ? 'checked' : '' }}>
                                Hiển thị
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="0"
                                    {{ $product->status == 0 ? 'checked' : '' }}>
                                Tạm ẩn
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                    <a href="{{ route('product.index') }}" class="btn btn-danger">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
@stop()
