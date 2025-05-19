@extends('admin.dashboard')

@section('content')
    <div class="container-fluid">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>image</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>
                        <img src="{{ asset('images/'.$item->product->Product_Image) }}" alt="" width="100" height="100">
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{ $item->product->Product_name }}</td>
                    <td>{{ $item->product->Price}}</td>
                    <td>
                        @if ($item->status == 'On The Way')
                                <a href="" class="btn btn-warning">{{$item->status}}</a>
                            @elseif ($item->status == 'Delievered')
                                <a href="" class="btn btn-success">{{$item->status}}</a>
                            @else

                            <a href="" class="btn btn-danger">In Process</a>
                        @endif
                    </td>
                    <td>
                        <div class="">
                            <a href="{{ route('onTheWay',$item->id) }}" class="btn btn-warning">On The Way</a>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('Delievered',$item->id) }}" class="btn btn-success">Delievered</a>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.print',$item->id) }}" class="btn btn-lg btn-primary w-auto px-3">
                            <i class="fa-solid fa-print"></i>
                        </a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
