@extends('admin.order.layout') @section('content')
<div class="container-fluid mt--6">
    <!-- Custom form validation -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Add New Order</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Back">
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
            <form class="needs-validation" novalidate action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <label class="form-control-label" for="validationInvoice">Invoice</label>
                    <input type="text" name="invoice" class="form-control" id="validationInvoice" placeholder="Invoice" value="" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="validationTotalPrice">Total Price</label>
                    <textarea name="total_price" class="form-control" id="validationTotalPrice" placeholder="Total Price" value="" required></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="form-control-label" for="validationStatus">Status</label>
                    <input type="text" name="status" class="form-control" id="validationStatus" placeholder="Status" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please Insert Price.
                    </div>
                    <label class="form-control-label" for="payment_method">Payment ID</label>
                    <select class="form-control" name="payment_method_id" id="payment_method">
                        @foreach($order as $order)
                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection