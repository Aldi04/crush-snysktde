@extends('admin.category.layout') @section('content')

<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Category</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Add Category">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Add Category</span>
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
                        <th scope="col" class="sort" data-sort="name">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($category as $category)
                <tbody class="list">
                    <tr>
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td style="display: flex;">
                            <form action="{{ route('category.edit',$category->id) }}">
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <button class="btn btn-outline-info btn-sm" type="submit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit"></i></button>
                            </form>
                            &emsp;
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                <a class="btn btn-outline-success btn-sm" href="{{ route('category.show',$category->id) }}" data-toggle="tooltip" data-original-title="Show"><i class="fas fa-eye"></i></a> @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
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