@extends('layouts.app')

@section('title', 'Users')

@section('content')

    @include('layouts.navbar')

    <style>
        .users-page {
            padding: 1.5rem 0;
        }

        .users-page h1 {
            color: #1e2a4a;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }

        .btn-create {
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            transition: filter .15s ease, transform .15s ease;
        }
        .btn-create:hover {
            filter: brightness(0.95);
            color: #fff;
            transform: translateY(-1px);
        }

        .users-search .form-control {
            border: 1px solid #e1e4f7;
            border-right: none;
        }
        .users-search .form-control:focus {
            box-shadow: none;
            border-color: #4f5fe8;
        }
        .users-search .btn-outline-secondary {
            border: 1px solid #e1e4f7;
            border-left: none;
            background-color: #fff;
            color: #4f5fe8;
            font-weight: 600;
        }
        .users-search .btn-outline-secondary:hover {
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
            border-color: #4f5fe8;
            color: #fff;
        }

        .users-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }
        .users-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }
        .users-table thead th {
            color: #4f5fe8;
            font-weight: 700;
            font-size: 0.85rem;
            border-bottom: none;
            text-transform: uppercase;
            letter-spacing: .03em;
        }
        .users-table tbody td {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
        }
        .users-table tbody tr:hover td {
            background-color: #f7f8fe;
        }
        .users-table tbody td a {
            color: #4f5fe8;
            text-decoration: none;
            font-weight: 600;
        }
        .users-table tbody td a:hover {
            text-decoration: underline;
        }

        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: capitalize;
        }
        .role-badge.role-admin {
            background-color: #e6f6f4;
            color: #0f9c8f;
        }
        .role-badge.role-kasir {
            background-color: #eef0fd;
            color: #4f5fe8;
        }

        .btn-edit-akun {
            background-color: #ffb020;
            border: none;
            color: #3a2a00;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-edit-akun:hover {
            background-color: #eba00f;
            color: #141413;
        }

        .btn-hapus {
            background-color: #e5484d;
            border: none;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-hapus:hover {
            background-color: #cf3e42;
        }

        .users-pagination .page-link {
            color: #4f5fe8;
            border: 1px solid #e1e4f7;
        }
        .users-pagination .page-item.active .page-link {
            background-color: #4f5fe8;
            border-color: #4f5fe8;
        }
        .users-pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="users-page">
        <h1>Halaman Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-create mb-3">Create</a>
        <form action="{{ route('admin.users') }}" method="GET">
          <div class="input-group users-search mb-3">
            <input 
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search username or email">
            <button class="btn btn-outline-secondary" type="submit">
              Search
            </button>
          </div>
        </form>
        <table class="table users-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $users->firstItem() + $loop->index }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role-badge role-{{ $user->role->name }}">{{ $user->role->name }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-edit-akun">
                                Edit Akun
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-hapus" onclick="return confirm(' Yakin hapus user ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="users-pagination">
            {{ $users->links() }}
        </div>
    </div>
@endsection