@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

<style>
    .users-form-container h3 {
        color: #1e2a4a;
        font-weight: 800;
        margin-bottom: 1.5rem;
    }

    .users-form-container label {
        color: #33395c;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }

    .users-form-container .form-control {
        border: 1px solid #e1e4f7;
        border-radius: 8px;
        padding: 0.55rem 0.9rem;
    }
    .users-form-container .form-control:focus {
        border-color: #4f5fe8;
        box-shadow: 0 0 0 0.2rem rgba(79, 95, 232, 0.15);
    }
    .users-form-container .form-control.is-invalid {
        border-color: #e5484d;
    }

    .users-form-container select.form-control {
        border: 1px solid #e1e4f7;
        border-radius: 8px;
    }

    .users-form-container .invalid-feedback {
        color: #e5484d;
    }

    .users-form-container .btn-success {
        background: #4f5fe8;
        border: none;
        font-weight: 600;
        padding: 0.5rem 1.4rem;
        border-radius: 8px;
    }
    .users-form-container .btn-success:hover {
        filter: brightness(0.95);
    }

    .users-form-container .btn-secondary {
        background-color: #eef0fd;
        border: 1px solid #e1e4f7;
        color: #4f5fe8;
        font-weight: 600;
        padding: 0.5rem 1.4rem;
        border-radius: 8px;
    }
    .users-form-container .btn-secondary:hover {
        background-color: #e1e4f7;
        color: #33395c;
    }
</style>

<div class="container users-form-container">
    <h3>Tambah User</h3>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" 
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" name="email" 
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email ?? '') }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" 
                class="form-control @error('password') is-invalid @enderror">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-3">
            <label>Role</label>
            <select name="role_id" 
                class="form-control @error('role_id') is-invalid @enderror">
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role )
                <option value="{{ $role->id }}"
                    @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                    {{ ucfirst($role->name) }}
                </option>
               @endforeach
            </select>

            @error('role_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection