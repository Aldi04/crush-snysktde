@extends('admin.payment_method.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Add New Payment Method</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('payment_method.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
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
            <form class="needs-validation" novalidate action="{{ route('payment_method.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <label class="form-control-label" for="validationName">Name</label>
                    <input type="text" name="name" class="form-control" id="validationName" placeholder="Name" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="validationNorek">No Rekening</label>
                    <input type="text" name="norek" class="form-control" id="validationNorek" placeholder="No Rekening" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please Insert Price.
                    </div>
                    <label class="form-control-label" for="validationKeterangan">Keterangan</label>
                    <textarea type="text" name="keterangan" class="form-control" id="validationKeterangan" placeholder="Keterangan" aria-describedby="inputGroupPrepend" required rows="3"></textarea>
                    <div class="invalid-feedback">
                        Please Insert Size.
                    </div>
                    <label class="form-control-label" for="validationStatus">Status</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status" id="status">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>

                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection