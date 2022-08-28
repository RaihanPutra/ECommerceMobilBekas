@extends('layouts.main')

@section('content')

<div class="card">
    <div class="card-body">
        <h4>My Profile</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>{{ $user->name }}</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{ $user->username }}</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4>Edit Profile</h4>
        <form action="{{route('account.update')}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror"
                    id="name" placeholder="Name" required value="{{ $user->name }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="username" placeholder="Username" required value="{{ $user->username }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="name@example.com" required value="{{ $user->email }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <label for="password">Password Confirmation</label>
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror" id="password"
                    placeholder="Password Confirmation">
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>
    </div>
</div>
@endsection