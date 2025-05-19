@extends('admin.dashboard')

@section('content')
    <div class="container">
        <div class="col-8 offset-2">
            <form action="{{ route('admin.productCreate') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="d-flex justify-content-center my-3">
                    <img src="{{ asset('Photos/no photo image.jpg')}}" class=" img-fluid rounded shadow " id="Image-preview" alt="Image Preview" width="200" height="200">

                </div>

                <h6 class="text-primary text-center">Preview</h6>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label @error('Product_name') is-invalid @enderror">Product Name</label>
                    <input type="text" class="form-control" name="Product_name" value="{{ old('Product_name')}}" id="exampleFormControlInput1" placeholder="Enter Product Name">
                    @error('Product_name')
                        <div class="text-danger">{{ $message }}</div>

                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label @error('Price') is-invali  @enderror">Price</label>
                    <input type="text" class="form-control" name="Price" value="{{ old('Price')}}" id="exampleFormControlInput1" placeholder="Enter  Price">
                    @error('Price')
                        <div class="text-danger">{{ $message }}</div>

                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label @error('Product_Quantity') is-invali @enderror">Quantity</label>
                    <input type="text" class="form-control" name="Product_Quantity" value="{{ old('Product_Quantity')}}" id="exampleFormControlInput1" placeholder="Enter  Quantity">
                    @error('Product_Quantity')
                        <div class="text-danger">{{ $message }}</div>

                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label @error('Product_Description') is-invalid  @enderror">Description</label>
                    <input type="text" class="form-control" name="Product_Description" value="{{ old('Product_Description')}}" id="exampleFormControlInput1" placeholder="Enter  Description">
                    @error('Product_Description')
                        <div class="text-danger">{{ $message }}</div>

                    @enderror
                </div>

                <div class="">
                    <label>Category</label>
                    <select name="category_name" class="form-control ">
                        <option>Choose Category</option>
                        @foreach ($Category as $item)
                            <option value="{{ $item->category_name }}" class="@error('category_name') is-invalid @enderror">{{ $item->category_name }}</option>
                        @endforeach

                        @error('category_name')
                            <div class="text-danger invalid-feedback">{{ $message }}</div>
                        @enderror
                    </select>
                </div>


                <div class="my-3">
                    <label for="formFile" class="form-label " >Upload Image</label>

                    <input class="form-control @error('Product_Image') is-invalid @enderror" type="file" name="Product_Image" id="formFile"
                    onchange="document.getElementById('Image-preview').src = window.URL.createObjectURL(this.files[0])">

                    @error('Product_Image')
                        <div class="text-danger">{{ $message }}</div>

                    @enderror
                  </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>

        </div>
    </div>
@endsection
