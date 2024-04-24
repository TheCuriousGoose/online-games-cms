@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header fs-3 d-flex align-items-center">
            Users
            <div class="ms-auto">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="card-body py-2 px-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Current credits</th>
                        <th>Credits used</th>
                        <th>Times played</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->credits }}</td>
                            <td>{{ $user->getCreditsUsed() }}</td>
                            <td>{{ $user->getTimesPlayed() }}</td>
                            <td>{{ $user->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@endsection
