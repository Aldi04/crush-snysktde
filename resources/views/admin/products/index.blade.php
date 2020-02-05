@extends('admin.products.layout') @section('content')

<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Products</h3>
                </div>
                <div class="col-6 text-right">

                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Add product">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Add Product</span>
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
            <table class="table table-flush" id="datatable-basic" style="width: 100%;">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                <tbody class="list">
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            Rp {{ number_format($product->price) }}
                        </td>
                        <td>
                            {{ $product->stock }}
                        </td>
                        <td>
                            {{ $product->size }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td style="display: flex;">
                            <form action="{{ route('products.edit',$product->id) }}">
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <button class="btn btn-outline-info btn-sm" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button>
                            </form>
                            &emsp;
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                <a class="btn btn-outline-success btn-sm" href="{{ route('products.show',$product->id) }}" data-toggle="tooltip" data-original-title="Show"><i class="fas fa-eye"></i></a> @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {!! $products->links() !!}
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