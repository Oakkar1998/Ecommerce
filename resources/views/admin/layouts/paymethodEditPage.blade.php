@extends('admin.dashboard')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                Payment Edit info
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <label for="">Account Name:</label>
                            
                        </div>
                        <div class="my-3">
                            <label for="">Phone / Account Number:</label>
                            
                        </div>
                        <div class="">
                            <label for="">Payment Method:</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <form action="{{ route('paymethodUpdate',$paymethods->id) }}" method="POST">
                            @csrf
                       
                        <div class="">
                            
                            <input type="text" value="{{ $paymethods->account_name }}" name="account_name">
                        </div>
                        <div class="my-3">
                            
                            <input type="text" value="{{ $paymethods->phone_account_number }}" name="phone_account_number">
                        </div>
                        <div class="">
                            
                            <input type="text" value="{{ $paymethods->payment_method }}" name="payment_method">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success float-right" type="submit">Update</button>
            </div>
        </form>
        </div>
    </div>
@endsection