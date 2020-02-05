@extends('admin.order.layout') @section('content')

<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Products</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('order.create') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Add product">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Add Order</span>
                    </a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success! </strong>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Light table -->
        <div class="table-responsive">
            <table class="table align-items-center table-flush" style="width: 100%;">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="id">No</th>
                        <th scope="col" class="sort" data-sort="name">User ID</th>
                        <th scope="col" class="sort" data-sort="detail">Invoice</th>
                        <th scope="col" class="sort" data-sort="price">Total Price</th>
                        <th scope="col" class="sort" data-sort="size">Status</th>
                        <th scope="col" class="sort" data-sort="stock">Payment ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($order as $order)
                <tbody class="list">
                    <tr>
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            <!--  -->
                        </td>
                        <td>
                            {{ $order->invoice }}
                        </td>
                        <td>
                            {{ $order->total_price }}
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>
                        <td>
                            <!--  -->
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <form action="{{ route('order.destroy',$order->id) }}" method="POST">
                                        <a class="dropdown-item" href="{{ route('order.show',$order->id) }}">Show</a>
                                        <a class="dropdown-item" href="{{ route('order.edit',$order->id) }}">Edit</a> @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {!! $order->links() !!}
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection