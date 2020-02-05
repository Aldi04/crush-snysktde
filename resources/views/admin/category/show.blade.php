@extends('admin.category.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Show Category</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
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
                        <strong>Category Name   :   </strong> {{ $category->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection