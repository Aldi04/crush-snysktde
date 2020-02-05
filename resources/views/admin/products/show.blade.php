@extends('admin.products.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Show Product</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Back</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug :</strong> {{ $product->slug }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name :</strong> {{ $product->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price :</strong> Rp {{ number_format($product->price) }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stock :</strong> {{ $product->stock }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Size :</strong> {{ $product->size }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description :</strong> {{ $product->desc }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category :</strong> {{ $product->category->name}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Image :</strong>
                    <div class="container" style="width: 100%;">
                        <div class="row">
                            @foreach($product->product_image as $image)
                            <div class="col-6 col-md-4 card">
                                <img style="height:300px;" src="{{ asset('product_image/'.$image->image)}}" alt="Card image cap" class="card-img-top">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection