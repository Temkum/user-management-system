@csrf
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
        value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset" name="name">
    @error('name')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset"
        id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('email')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
@isset($create)
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
            id="exampleInputPassword1" value="{{ old('password') }}">
        @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" id="exampleInputPassword1" value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>
@endisset
<div class="mb-3">
    @foreach ($roles as $role)
        <div class="form-check">
            <input type="checkbox" class="form-check-input @error('roles') is-invalid @enderror" name="roles[]"
                value="{{ $role->id }}" id="{{ $role->name }}"
                @isset($user) 
                    @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                        checked
                    @endif 
                @endisset>
            <label for="{{ $role->name }}">{{ $role->name }}</label>

            @error('roles')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">Submit</button>
