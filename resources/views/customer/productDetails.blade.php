@extends('customer.master')

@section('content')
   <div class="container my-5">
        <div class="card">
                <div class="card-header p-3">
                    <h3>Product Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-6 col-lg-6 col-sm-12">
                            <div class="my-5">
                                <img src="{{ asset('images/'.$Product->Product_Image) }}" alt="" width="100%" class="p-3">
                            </div>
                        </div>

                        <div class="col-4 col-md-6 col-lg-6 col-sm-12 mt-5">
                            <div class="my-3">
                                <h5>Product Name</h5>
                                <h3>{{ $Product->Product_name }}</h3>
                            </div>

                            <div class="mb-3">
                                <h5>Price</h5>
                                <h3>{{ $Product->Price }} MMK</h3>
                            </div>

                            <div class="mb-3">
                                <h5>Product Qty</h5>
                                <h3> {{ $Product->Product_Quantity }}</h3>
                            </div>

                            <div class="mb-3">
                                <h5>Category</h5>
                                <h3>{{ $Product->Category_name }}</h3>
                            </div>

                            <div class="">

                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <h5>Description</h5>
                                <h6>{{ $Product->Product_Description }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
   </div>
   </div>
@endsection
