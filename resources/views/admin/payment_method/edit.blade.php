@extends('admin.payment_method.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Edit Payment Method</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('payment_method.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
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
            <form action="{{ route('payment_method.update',$payment_method->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $payment_method->name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">No rekening</label>
                            <textarea name="norek" style="height:100px" class="form-control" placeholder="No Rekening"> {{ $payment_method->norek }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $payment_method->keterangan}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="validationStatus">Status</label>
                            <input type="text" name="status" class="form-control" id="validationStatus" placeholder="Status" value="{{ $payment_method->status }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection