@extends('layouts.app')

@section('content')
<div class="container">
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