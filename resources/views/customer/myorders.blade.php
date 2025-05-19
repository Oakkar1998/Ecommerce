@extends('customer.master')

@section('content')

    <div class="container my-5">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @if($order->count() != 0)
                    @foreach ($order as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/'.$item->product->Product_Image) }}" alt="" width="100" height="100">
                            </td>
                            <td>{{ $item->product->Product_name }}</td>
                            <td>{{ $item->product->Price }}</td>
                            <td>
                                @if($item->status == 'Delievered' )

                                    <a href="" class="btn btn-success">{{ $item->status }}</a>

                                @elseif ($item->status == 'On The Way')

                                    <a href="" class="btn btn-warning">{{ $item->status }}</a>
                                @else

                                    <a href="" class="btn btn-primary">{{ $item->status }}</a>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr class="">
                            <td class="p-5 text-center h5" colspan="4">No Order Found!</td>
                        </tr>
                    @endif
            </tbody>
          </table>
    </div>
@endsection
