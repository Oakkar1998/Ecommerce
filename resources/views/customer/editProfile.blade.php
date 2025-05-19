@extends('customer.master')

@section('content')
    <div class="my-5">
        <div class="card">
            <div class="card-header">
                Edit Profile
            </div>
            <form action="{{ route('profileEdit',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-3 offset-1">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset($user->image ? 'profileImages/'.$user->image : 'Photos/nophotoimage1.jpg')  }}" id="preview" alt="" class="rounded-circle img-thumbnail p-2" height="100" width="100">
                            
                        </div>
                        <div class="mt-3">
                            <input type="file" class="form-control" name="image"
                            onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    <div class="col-4 offset-1">
                        <div class="">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                        </div>
                        <div class="my-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" name="phone">
                        </div>
                        <div class="">
                            <label for="">Address</label>
                            <textarea type="text" class="form-control" name="address">
                                {{ Auth::user()->address }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
        </div>
    </div>
@endsection