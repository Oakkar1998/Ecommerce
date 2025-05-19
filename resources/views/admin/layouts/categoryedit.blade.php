@extends('admin.dashboard')

@section('content')
    <h1 class="text-center mt-5">Update Category</h1>
    <form action="{{  route('admin.categoryEdit',$category->id)}}" method="POST">
        @csrf

        <div class="container mt-5">

            <div class="input-group mb-3">

                <input type="text" class="form-control w-50 @error('category_name') is-invalid  @enderror" name="category_name" placeholder="Category Name" value="{{ $category->category_name }}">
                <button class="btn btn-outline-primary" type="submit" class="btn btn-primary ms-3">Update Category</button>
                @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </form>
@endsection
