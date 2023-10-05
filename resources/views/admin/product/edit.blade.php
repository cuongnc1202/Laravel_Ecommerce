@extends('master.admin')

@section('title', 'Edit Product ' . $product->name)

@section('content')
    <div class="container">
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                            placeholder="Type here...">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Feature Image</label>
                        <input type="file" class="form-control" name="feature_image">
                        <img class=" mt-2" src="{{ url('uploads') }}/{{ $product->feature_image }}" width="150">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
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
                        <label for="">Short Description</label>
                        <textarea class="form-control short_description" name="short_description" rows="1" placeholder="Type here...">{{ $product->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control description" name="description" rows="3" placeholder="Type here...">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="" class="form-control" name="price" value="{{ $product->price }}"
                            placeholder="Type here...">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Sale price</label>
                        <input type="" class="form-control" name="sale_price" value="{{ $product->sale_price }}"
                            placeholder="Type here...">
                        @error('sale_price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="">Color</label>
                        <select class="form-control" name="color_id">
                            <option>Select 1</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}"
                                    {{ $color->id == $product->color_id ? 'selected' : '' }}>
                                    {{ $color->name }} </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group product__size">
                        <label for="">Size</label>
                        @foreach ($sizes as $size)
                            <div class="checkbox">
                                <label>
                                    <input {{ in_array($size->id, $sizeIds) ? 'checked' : '' }} type="checkbox"
                                        name="size_id[]" value="{{ $size->id }}" />
                                    {{ $size->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id">
                            <option>Select 1</option>
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
                        <label for="">Status</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="1"
                                    {{ $product->status == 1 ? 'checked' : '' }}>
                                Display
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="0"
                                    {{ $product->status == 0 ? 'checked' : '' }}>
                                Hidden
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@stop()
