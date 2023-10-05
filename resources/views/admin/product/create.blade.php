@extends('master.admin')

@section('title', 'Create Product')

@section('content')
    <div class="container">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Product name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Type here...">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Feature Image</label>
                        <input type="file" class="form-control" name="feature_image">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                        @error('images')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Short Description</label>
                        <textarea class="form-control short_description" name="short_description" rows="1" placeholder="Product's short description...">{{ old('short_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control description" name="description" rows="3" placeholder="Product's description...">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="" class="form-control" name="price" value="{{ old('price') }}"
                            placeholder="Type here...">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Sale price</label>
                        <input type="" class="form-control" name="sale_price" value="0"
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
                                <option value="{{ $color->id }}"> {{ $color->name }} </option>
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
                                    <input type="checkbox" name="size_id[]" value="{{ $size->id }}" />
                                    {{ $size->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('size_id[]')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id">
                            <option>Select 1</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
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
                                <input type="radio" class="form-check-input" name="status" value="1" checked>
                                Display
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="0">
                                Hidden
                            </label>
                        </div>
                    </div>
                    <div class="product--button d-flex justify-content-around">
                        <button class="btn btn-success">Create</button>
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop()


@section('js')


@stop()
