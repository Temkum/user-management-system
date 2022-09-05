@extends('templates.main')

@section('content')
    <h1 class="">USERS</h1>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-success mb-2" role="button">Add user</a>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary"
                                role="button">Edit</a>
                            <button class="btn btn-sm btn-danger" role="button"
                                onclick="event.preventDefault(); 
                                document.getElementById('delete-user-form-{{ $user->id }}').submit();">Delete</button>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="hide"
                                id="delete-user-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
