@extends('admin.products.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Edit Product</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Back</span>
                    </a>
                </div>
            </div>
        </div>
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
        <!-- Card body -->
        <div class="card-body">
            <form action="{{ route('products.update',$products->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Slug</label>
                            <input type="hidden" name="id" value="{{ $products->id}}">
                            <input type="text" name="slug" class="form-control" placeholder="Product slug" value="{{ $products->slug }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $products->name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $products->price}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="validationStock">Stock</label>
                            <input type="text" name="stock" class="form-control" id="validationStock" placeholder="Stock" value="{{ $products->stock }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="validationSize">Size</label>
                            <input type="text" name="size" class="form-control" id="validationSize" placeholder="Size" value="{{ $products->size }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Description</label>
                            <textarea name="desc" style="height:100px" class="form-control" placeholder="Description"> {{ $products->desc }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Select Category</label>
                            <select class="form-control" name="category_id" id="category">
                                @foreach($category as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="image">Select Image</label>
                            <div class="custom-file">
                                <input name="image[]" type="file" class="custom-file-input" id="customFileLang" lang="en" multiple multiple accept='image/*'>
                                <label class="custom-file-label" for="customFileLang">Select Image</label>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection