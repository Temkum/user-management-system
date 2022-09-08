@extends('templates.main')

@section('content')
    <h1 class="">Login</h1>

    <div class="form-width center-item">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Reset password</button>
        </form>
    </div>
@endsection
