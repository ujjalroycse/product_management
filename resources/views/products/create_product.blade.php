@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 offset-2">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Add New Product</h2>
                        <hr>
                    </div>
                    @if ( session('success') )
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Good News!</h4>
                        <hr>
                        <p class="mb-0">{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name *</label>
                            <input type="text" value="{{ old('product_name') }}" class="form-control" name="product_name" id="product_name"/>
                            @if ($errors->has('product_name'))
                                <span class="text-danger">{{$errors->first('product_name')}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description *</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Product Photo *</label>
                            <input type="file" value="{{ old('photo') }}" class="form-control" name="photo" id="photo"/>
                            @if ($errors->has('photo'))
                            <span class="text-danger">{{$errors->first('photo')}}</span>
                        @endif
                        </div>
                        <button class="btn btn-dark" type="submit">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection