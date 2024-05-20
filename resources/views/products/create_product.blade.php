<!doctype html>
<html lang="en">
    <head>
        <title>PDMS</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <main>
            <nav class="navbar ps-5 navbar-expand-lg navbar-dark bg-primary">
                  <a class="ms-5 navbar-brand" href="{{ url('/') }}">Home</a>
                  <a class="ms-3 navbar-brand" href="{{ url('/create-product') }}">Add Product</a>
              </nav>
            <div class="container">
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
            </div>
        </main>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
