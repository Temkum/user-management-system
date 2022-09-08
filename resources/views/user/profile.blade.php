@extends('templates.main')

@section('content')
    <h1 class="">Update Profile</h1>
    <div class="form-width center-item">
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ auth()->user()->name }}" aria-describedby="name" name="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ auth()->user()->email }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
