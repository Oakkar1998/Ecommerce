@extends('admin.dashboard')

@section('content')

{{-- Search start --}}
    <div class="">
        <form action="{{ route('admin.productSearch') }}" method="GET">
            @csrf
            <div class="input-group mb-3 container w-auto">
                <input type="text" class="form-control" value="{{ request()->search}}" placeholder="Search..." name="search">
                <button class="btn btn-outline-primary px-5" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
{{-- Search end --}}
   <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Product List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{asset('images/'.$product->Product_Image)}}" alt="" width="80" height="80"></td>
                                <td>{{ $product->Product_name }}</td>
                                <td>{{ $product->Price }}</td>
                                <td>{{ $product->Product_Quantity }}</td>
                                <td>{{ $product->Category_name }}</td>

                                <td>
                                    <a href="{{ route('admin.productEdit',$product->id) }}" class="btn  btn-success"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ route('admin.productDelete',$product->id) }}" class="btn  btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                           @else
                            <tr>
                                <td colspan="6">
                                    <h4 class="text-center text-white p-3 h-4 fw-bold">
                                        No Product Found !
                                    </h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
   </div>
@endsection
