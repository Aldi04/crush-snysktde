@extends('admin.products.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Add New Product</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Back</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Card body -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form class="needs-validation" novalidate action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <label class="form-control-label" for="validationSlug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="validationSlug" placeholder="Slug" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="validationName">Name</label>
                    <input type="text" name="name" class="form-control" id="validationName" placeholder="Product Name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="validationPrice">Price</label>
                    <input type="text" name="price" class="form-control" id="validationPrice" placeholder="Price" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please Insert Price.
                    </div>
                    <label class="form-control-label" for="validationStock">Stock</label>
                    <input type="text" name="stock" class="form-control" id="validationStock" placeholder="Stock" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please Insert Stock.
                    </div>
                    <label class="form-control-label" for="validationSize">Size</label>
                    <input type="text" name="size" class="form-control" id="validationSize" placeholder="Size" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please Insert Size.
                    </div>
                    <label class="form-control-label" for="validationDesc">Description</label>
                    <textarea name="desc" class="form-control" id="validationDesc" placeholder="Description" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="category">Select Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label class="form-control-label" for="image">Select Image</label>
                    <div class="custom-file">
                        <input name="image[]" type="file" class="custom-file-input" id="customFileLang" lang="en" multiple multiple accept='image/*'>
                        <label class="custom-file-label" for="customFileLang">Select Image</label>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection