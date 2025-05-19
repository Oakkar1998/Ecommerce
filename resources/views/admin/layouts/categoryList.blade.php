@extends('admin.dashboard')

@section('content')
    <div class="text-center text-white">
        <h3>Category List</h3>
    </div>
    <form action="{{ route('admin.categorySearch') }}" method="GET">
        <div class="container my-3 col-6">
            <div class="d-flex justify-content-center mt-3">
                <input type="text" name="CategorySearch" class="form-control" placeholder="Search..."
                    value="{{ request()->CategorySearch }}">
                <button class="btn btn-sm btn-outline-primary px-5" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-white">Category Name</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($categories->count() > 0)
                    @foreach ($categories as $item)
                        <tr>

                            <td>

                                {{ $item->category_name }}

                            </td>
                            <td>
                                <a href="{{ route('admin.categoryEdit', $item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('admin.categorydelete', $item->id) }}" class="btn btn-danger">Delete</a>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">
                            <h4 class="text-center text-white p-3 h-4 fw-bold">
                                No Category Found !
                            </h4>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-5">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
