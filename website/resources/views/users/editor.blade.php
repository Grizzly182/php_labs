@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-2 mb-2">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#">Create New User</a>
            </div>
            <form class="mt-2 mb-2" action="{{ route('users.search') }}">
                <input type="search" class="form-control" placeholder="Find user here" name="user_search">
            </form>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-2">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Verified At</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Role</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><img src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}" width="100" height="100" />
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>{{ $user->getRoleNames()[0] }}</td>
                <td>
                    <a class="btn btn-primary btn-block mt-1 mb-1" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <a class="btn btn-primary btn-block mt-1 mb-1"
                        href="{{ route('users.download', $user->id) }}">Download</a>
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block mt-1 mb-1">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
