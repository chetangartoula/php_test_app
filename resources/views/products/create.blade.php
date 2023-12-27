@extends('layout.product_layout')

@section('main')
    <div class="col-md-8">
        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mt-3 p-4">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Product Name"
                        value="{{ old('name') }}" name="name">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description"
                        value="{{ old('description') }}" name="description">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    @if ($errors->has('description'))
                        <div class="text-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image:</label>
                    <input type="file" class="form-control" id="product_image" name="product_image"
                        value="{{ old('product_image') }}">
                    @if ($errors->has('product_image'))
                        <div class="text-danger">{{ $errors->first('product_image') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
