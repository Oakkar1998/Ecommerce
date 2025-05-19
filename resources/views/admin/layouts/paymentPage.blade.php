@extends('admin.dashboard')

@section('content')
   
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Payment Info
                    </div>
                    <form action="{{ route('paymethodCreate') }}" method="POST">

                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <label for="">Account Name:</label>
                                        
                                    </div>
                                    <div class="my-3">
                                        <label for="">Phone/Account Number:</label>
                                    </div>
                                    <div class="">
                                        <label for="">Payment Type:</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input type="text" name="account_name" id="">
                                        @error('account_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <input type="text" name="phone_account_number" id="">
                                        @error('phone_account_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <input type="text" name="payment_method" id="">
                                        @error('payment_method')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success w-100 text-white" type="submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Account Name</th>
                            <th>Phone / Account Number</th>
                            <th>Payment Method</th>
                            <td >Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymethods as $paymethod )
                        
                        <tr>
                            <td>{{ $paymethod->account_name }}</td>
                            <td>{{ $paymethod->phone_account_number }}</td>
                            <td>{{ $paymethod->payment_method }}</td>
                            <td>
                                    <a href="{{ route('paymethodEditPage',$paymethod->id) }}" class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                        
                                    <a href="{{ route('paymethodDelete',$paymethod->id) }}" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection