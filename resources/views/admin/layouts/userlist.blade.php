@extends('admin.dashboard')

@section('content')

<div class="container">
    <table class="table-striped table table-hover">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            

            @foreach ($users as $user)
            <tr>
                <td> {{  $user->name }}</td>
                <td>{{  $user->email }}</td>
                <td>{{  $user->phone }}</td>
                <td>{{  $user->address }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    @if($user->role != "admin")

                        <a href="{{ route('userDelete',$user->id) }}" class="btn btn-primary">
                            
                                <i class="fa-solid fa-trash-can"></i>
                            
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
                
            
        </tbody>
    </table>
    <div class="mt-5 d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>

    
@endsection