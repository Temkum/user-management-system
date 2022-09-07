@extends('templates.main')

@section('content')
    <h1 class="">Add New User</h1>
    <div class="form-width center-item">
        <div class="card">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form', ['create' => true])
            </form>
        </div>
    </div>
@endsection
