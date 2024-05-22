@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 offset-2">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Update "{{ $product->product_name }}" Product</h2>
                        <hr>
                    </div>
                    @if ( session('success') )
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Good News!</h4>
                        <hr>
                        <p class="mb-0">{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ url('/update-product') }}/{{ $product->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name *</label>
                            <input type="text" value="{{ old('product_name',$product->product_name) }}" class="form-control" name="product_name" id="product_name"/>
                            @if ($errors->has('product_name'))
                                <span class="text-danger">{{$errors->first('product_name')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description *</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description',$product->description) }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Product Photo *</label>
                            @if ( $product->image )
                                <img width="100" src="{{asset('productImages')}}/{{$product->image}}" alt="">
                            @endif
                            <input type="file" value="{{ old('photo') }}" class="form-control" name="photo" id="photo"/>
                            @if ($errors->has('photo'))
                            <span class="text-danger">{{$errors->first('photo')}}</span>
                        @endif
                        </div>
                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection