@extends('admin.dashboard')

@section('content')
    <h1 class="text-center mt-5">Add Category</h1>
    <form action="{{ route('admin.category') }}" method="POST">
    <div class="mt-5">


            @csrf

                <div class="d-flex justify-content-center">
                    <div class="mb-3">
                        <input type="text" class="form-control  @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" name="category_name"   placeholder="Category">
                            @error('category_name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary ">Add Category</button>
                    </div>

                </div>






    </div>
</form>
@endsection
