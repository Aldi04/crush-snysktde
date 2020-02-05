@extends('admin.payment_method.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Show Payment Method</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('payment_method.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
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
                        <strong>Name :</strong> {{ $payment_method->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No Rekening :</strong> {{ $payment_method->norek }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan:</strong> {{ $payment_method->keterangan }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong> 
                        @if ($payment_method->status==1)
                            <span class="badge badge-success">Active</span> 
                        @else($payment_method->status==0)
                            <span class="badge badge-danger">Not Active</span> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection