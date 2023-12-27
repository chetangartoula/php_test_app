<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Products</a>
            </li>

        </ul>

    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block mt-1">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="card mt-3 p-4">
                        <h3 class="text-info">Product Edit #{{$product->name}}</h3>

                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Product Name"
                                value="{{ old('name', $product->name) }}" name="name">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">description:</label>
                            <input type="text" class="form-control" id="description" placeholder="Enter description"
                                value="{{ old('description', $product->description) }}" name="description">
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
        </div>
    </div>

</body>

</html>
