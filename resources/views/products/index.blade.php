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
        <div class="row">
            <a href="{{ route('create.product') }}" class="btn btn-primary mt-4 text-align-right">
                Create Product
            </a>
        </div>
        <div class="row mt-3">

            <div class="col-md-8 justify-content-center">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>sno</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                      
                            <tr>



                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="/products/{{ $item->image }}" alt="test-image" class="rounded-circle"
                                        width="40" height="40">
                                </td>

                                <td>
                                    <a href="products/{{ $item->id }}/edit" class="btn btn-dark btn-sm"> Edit
                                        Product</a>
                                    <a href="products/{{ $item->id }}/delete" class="btn btn-danger btn-sm"> Delete
                                        Product</a>

                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>

</html>
