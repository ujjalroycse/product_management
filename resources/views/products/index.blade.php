@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-success text-center">All Products</h1>
    @if (session('success'))
        <div class="alert alert-danger" role="alert">
            <p class="mb-0">{{ session('success') }}</p>
        </div>
    @endif
    <table class="mt-3 table table-bordered">
        <thead>
            <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th>{{ $loop->index +1}}</th>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <img width="40" src="{{asset('productImages')}}/{{$product->image}}" alt="N\A">
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-info" href="{{ url('edit-product') }}/{{ $product->id }}">Edit</a>
                    <a class="btn btn-sm btn-outline-warning" href="{{ url('delete-product') }}/{{ $product->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection