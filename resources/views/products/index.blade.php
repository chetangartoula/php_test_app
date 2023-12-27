@extends('layout.product_layout')

@section('main')
    <div class="col-md-6"> <a href="{{ route('create.product') }}" class="btn btn-primary mt-4 text-align-left">
            Create Product
        </a></div>


    <div class="col-md-8 mt-3 justify-content-center">

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
                            <img src="/products/{{ $item->image }}" alt="test-image" class="rounded-circle" width="40"
                                height="40">
                        </td>

                        <td>
                            <a href="products/{{ $item->id }}/edit" class="btn btn-dark btn-sm"> Edit
                                Product</a>




                            <form action="{{ route('store.product.delete', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete Product</button>

                            </form>

                        </td>


                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    </div>
@endsection
