@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 offset-2">
            <div class="card mt-5">
                <div class="card-body">
                    <p>Product Name : <strong>{{ $product->product_name }}</strong></p>
                    <p>Product Name : <strong>{{ $product->description }}</strong></p>
                    <p>Image :</p>
                    <img src="{{ asset('productImages') }}/{{ $product->image }}" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection