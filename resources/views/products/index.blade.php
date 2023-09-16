@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                        </div>
                        <table class="table table-bordered">
                            <tr>

                                <th>Name</th>
                                <th>Details</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>

                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->detail }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                            <a class="btn btn-info"
                                                href="{{ route('products.show', $product->id) }}">Show</a>

                                            <a class="btn btn-primary"
                                                href="{{ route('products.edit', $product->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
