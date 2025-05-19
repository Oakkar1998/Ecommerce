@extends('customer.master')

@section('content')
    <div class="container my-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Action
                </tr>
            </thead>
            <tbody>
                <?php

                  $value = 0;
                  $delivery_charges = 5000

                ?>
                @if($Carts->count() > 0)
                    @foreach ($Carts as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('images/'.$item->product->Product_Image) }}" alt="" width="100px">

                        </td>
                        <td>{{ $item->product->Product_name }}</td>
                        <td>{{ $item->product->Price }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('customer.cartDelete', $item->id) }}">
                                <button class="btn btn-danger">Remove</button>
                            </a>
                        </td>


                    </tr>

                    <?php

                        $value = $value + $item->product->Price


                    ?>
                    @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center p-5 h3 bg-dark text-white">
                        No Product Found !
                    </td>
                </tr>
                @endif


            </tbody>
        </table>
        @if($value != 0)

                <div class="d-flex justify-content-end my-5">

                    <div class="col">
                        <div class="card shadow-lg">
                            <div class="card-header text-white bg-black">
                                Payment Info
                            </div>
                            <div class="card-body">
                                @foreach ($paymethods as $paymethod )
                                    <p>Account Name: {{ $paymethod->account_name }}</p>
                                    <p>Phone/Account Number: {{ $paymethod->phone_account_number }}</p>
                                    <p class="d-inline">Payment Method: <p class="text-danger d-inline">{{ $paymethod->payment_method }}</p></p>
                                    <hr>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card col border-secondary shadow-lg">
                        <div class="card-header text-white bg-black">
                            <h4>Info</h4>
                        </div>
                        <div class="card-body h5 mt-3">
                            <div class="row">
                                <div class="col">
                                    <p>Invoice Number:</p>
                                    <p>Net Price:</p>
                                    <p>Tax (5%):</p>
                                    <p>Delivery Charges:</p>
    
                                </div>
                                <div class="col">
                                    <p>{{ $invoice_number }}</p>
                                    <p> {{ $value }} MMK</p>
                                    <p>{{ $value * 0.05 }} MMK</p>
                                    <p> {{$delivery_charges}} MMK</p>
    
    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer h5">
                            <div class="row mt-3">
                                <div class="col">
                                    <p>Total :</p>
                                </div>
                                <div class="col text-danger">
                                    <p> {{ $value + $delivery_charges + ($value * 0.05)  }} MMK</p>
                                </div>
                                <div class="">
                                    <div class="card">
                                        <div class="card-header text-white bg-black">
                                            User Info
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p>Name :</p>
                                                    <p>Phone :</p>
                                                    <p>Address :</p>
                                                </div>
                                                <div class="col-8">
                                                    <form action="{{ route('createOrder') }}" method="POST">
                                                        @csrf
                                                    <input type="hidden" name="invoice_number" value={{ $invoice_number }}>
                                                    <p>{{ Auth::user()->name }}</p>
                                                    <p>{{ Auth::user()->phone }}</p>
                                                    <p>{{ Auth::user()->address }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary w-100 p-3"><h4>Order Now !</h4></button>
                                </form>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    
                </div>
        @endif
    </div>
    {{-- <div class="">{{$Product->link()}}</div> --}}
@endsection
