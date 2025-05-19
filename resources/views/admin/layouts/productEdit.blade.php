@extends('admin.dashboard')
 @section('content')


<div class="container-fluid">
    <div class="card col-6 offset-2">
        <div class="card-header">
            <h3>Product Edit</h3>
        </div>
        <form action="{{ route('admin.productEdit',$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- old image --}}
                

                <div class=" d-flex justify-content-center my-3">
                    <img src="{{asset('images/'.$product->Product_Image)}}"  alt="" width="150" height="150" class="img-fluid rounded" id="New_Image">


                </div>
                <h6 class="text-center my-2 text-primary">Current Image</h6>
                <div class="mb-3">
                    {{-- Update image --}}
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control  @error ('New_Image') is-invalid @enderror" name="New_Image" type="file" id="formFile"
                    onchange="document.getElementById('New_Image').src = window.URL.createObjectURL(this.files[0])">
                    @error('New_Image')
                        <span class="text-danger">{{ $message }}</span>

                    @enderror
                  </div>
                <div class="">
                    <label for="" class="mt-3">Product Name</label>
                    <input type="text" name="Product_name" class="form-control @error ('Product_name') is-invalid @enderror " value="{{ old('Product_name',$product->Product_name) }}">
                    @error('Product_name')
                        <span class="text-danger">{{ $message }}</span>

                    @enderror
                </div>

                <div class="">
                    <label for="" class="mt-3">Product Price</label>
                    <input type="text" name="Price" class="form-control  @error ('Price') is-invalid @enderror" value="{{ old('Price',$product->Price) }}">
                    @error('Price')
                        <span class="text-danger">{{ $message }}</span>

                    @enderror
                </div>

                <div class="">
                    <label for="" class="mt-3">Product Quantity</label>
                    <input type="text" name="Product_Quantity" class="form-control @error ('Product_Quantity') is-invalid @enderror" value="{{ old('Product_Quantity',$product->Product_Quantity) }}">
                    @error('Product_Quantity')
                        <span class="text-danger">{{ $message }}</span>

                    @enderror
                </div>

                <div class="">
                    <label for="" class="mt-3">Product Description</label>
                    <textarea type="text" name="Product_Description" class="form-control @error ('Product_Description') is-invalid @enderror" rows="5" cols="10">
                        {{ old('Product_Description',$product->Product_Description) }}
                    </textarea>
                    @error('Product_Description')
                        <span class="text-danger">{{ $message }}</span>

                    @enderror
                </div>


            </div>
            <div class="card-footer mt-3 d-flex justify-content-center">
                <button class="btn btn-success" type="submit" >Update</button>
            </div>
        </form>
    </div>

</div>
 @endsection
