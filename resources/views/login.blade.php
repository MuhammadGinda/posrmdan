@extends('layouts.app')

@section('title', 'Login')

@section('content')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(160deg, #eef1f6, #f3ede8);
            min-height: 100vh;
        }

        .login-card {
            width: 20rem;
            border: none;
            border-radius: 14px;
            box-shadow: 0 15px 35px rgba(90, 100, 120, 0.15);
            padding: 8px 4px;
        }

        .login-card .card-title {
            color: #4a5568;
            font-weight: 700;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .login-card .card-subtitle {
            color: #a0aec0;
            font-size: 0.8rem;
        }

        .login-card .form-label {
            color: #8ea4bd;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .login-card .form-control {
            border: 1px solid #dde3ea;
            border-radius: 8px;
            padding: 10px 12px;
        }

        .login-card .form-control:focus {
            border-color: #a9bdd4;
            box-shadow: 0 0 0 3px rgba(169, 189, 212, 0.25);
        }

        .login-card .form-check-input:checked {
            background-color: #a9bdd4;
            border-color: #a9bdd4;
        }

        .login-card .form-check-label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .login-card .btn-primary {
            background-color: #a9bdd4;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 0;
        }

        .login-card .btn-primary:hover {
            background-color: #93a9c3;
        }

        .login-card .badge.text-bg-danger {
            background-color: #f3d6d6 !important;
            color: #a14b4b !important;
            font-weight: 500;
        }
    </style>

    <div class="card login-card text-center position-absolute top-50 start-50 translate-middle">
        <h5 class="card-title">Login POS</h5>
        <div class="card-body">
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <div class="badge text-bg-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                        <div class="badge text-bg-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

@endsection