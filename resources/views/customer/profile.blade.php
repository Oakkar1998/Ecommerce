@extends('customer.master')

@section('content')


    <div class="my-5">
        <div class="card">
            <div class="card-header">
                <h5>
                    Profile
                </h5>
            </div>
            <div class="card-body my-3">
                <div class="row">
                    <div class="col-3 offset-1">
                        <img src="{{ asset($user->image ? 'profileImages/'.$user->image : 'Photos/nophotoimage1.jpg') }}" alt="" width="150" height="150" class=" img-thumbnail rounded-circle">

                    </div>
                    <div class="col-2">
                       <div class="fw-bold text-primary">
                            Name:
                       </div>
                        <div class="fw-bold text-primary mt-3">
                            Phone:
                        </div>
                        <div class="fw-bold text-primary mt-3">
                            Email:
                        </div>
                        <div class="fw-bold text-primary mt-3">
                            Address:
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold text-dark">
                            {{$user->name}}
                       </div>
                        <div class="fw-bold text-dark mt-3">
                            {{$user->phone}}
                        </div>
                        <div class="fw-bold text-dark mt-3">
                            {{$user->email}}
                        </div>
                        <div class="fw-bold text-dark mt-3">
                            {{$user->address}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
