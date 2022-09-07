@extends('templates.main')

@section('content')
    <h1 class="">Edit user</h1>
    <div class="form-width center-item">
        <div class="card">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @method('PATCH')
                @include('admin.users.partials.form')
            </form>
        </div>
    </div>
@endsection
