@extends('layouts.app')

@section('title', 'Users')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .users-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .users-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .users-header h1 {
            color: #2b2d6e;
            font-weight: 800;
            font-size: 1.7rem;
            margin: 0;
        }

        .users-subtitle {
            color: #8a8fb8;
            font-size: 0.9rem;
            margin-top: 0.2rem;
        }

        .btn-create {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.6rem 1.4rem;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(74, 79, 192, 0.28);
            transition: all .15s ease;
        }
        .btn-create:hover {
            background: linear-gradient(135deg, #5a5fce, #3a3fb0);
            color: #fff;
            transform: translateY(-1px);
        }

        .users-toolbar {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(43, 45, 110, 0.08);
            padding: 1rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .users-search .input-group-text {
            background: #fbfbff;
            border: 1px solid #e3e5f5;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #9aa0c9;
        }
        .users-search .form-control {
            border: 1px solid #e3e5f5;
            border-left: none;
            border-right: none;
            padding: 0.6rem 0.9rem;
        }
        .users-search .form-control:focus {
            box-shadow: none;
            border-color: #6a6fd8;
        }
        .users-search .btn-search {
            border: 1px solid #e3e5f5;
            border-left: none;
            background: #fbfbff;
            color: #4a4fc0;
            font-weight: 600;
            border-radius: 0 10px 10px 0;
            padding: 0 1.1rem;
        }
        .users-search .btn-search:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
            color: #fff;
        }

        .users-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
        }

        .users-table {
            margin-bottom: 0;
        }
        .users-table thead th {
            background: linear-gradient(135deg, #e3f7ee, #e7f6fb);
            color: #2b2d6e;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            border: none;
            padding: 0.9rem 1rem;
            vertical-align: middle;
        }
        .users-table tbody td {
            color: #3a3d5a;
            font-size: 0.9rem;
            vertical-align: middle;
            border-color: #f2f3fa;
            padding: 0.85rem 1rem;
        }
        .users-table tbody tr:hover td {
            background-color: #f8f8fe;
        }

        .users-name {
            font-weight: 600;
            color: #2b2d6e;
        }

        .users-email {
            color: #8a8fb8;
        }

        .role-badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: capitalize;
        }
        .role-badge.role-admin {
            background: #e3f7ee;
            color: #17a673;
        }
        .role-badge.role-kasir {
            background: #eef0fd;
            color: #4a4fc0;
        }

        .btn-edit-akun {
            background: #eef0fd;
            border: none;
            color: #4a4fc0;
            font-weight: 600;
            font-size: 0.82rem;
            border-radius: 8px;
            padding: 0.4rem 0.85rem;
        }
        .btn-edit-akun:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            color: #fff;
        }

        .btn-hapus {
            background: #fdecec;
            border: none;
            color: #d9534f;
            font-weight: 600;
            font-size: 0.82rem;
            border-radius: 8px;
            padding: 0.4rem 0.85rem;
        }
        .btn-hapus:hover {
            background: #f9d5d5;
            color: #c9302c;
        }

        .users-empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #b3b7d6;
        }
        .users-empty-state .icon {
            font-size: 2.2rem;
            display: block;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }
        .users-empty-state .text {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .users-pagination {
            margin-top: 1.25rem;
        }
        .users-pagination .page-link {
            color: #4a4fc0;
            border: 1px solid #e3e5f5;
        }
        .users-pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
        }
        .users-pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="users-page">

        <div class="users-header">
            <div>
                <h1>Halaman Users</h1>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn btn-create">+ Tambah User</a>
        </div>

        <div class="users-toolbar">
            <form action="{{ route('admin.users') }}" method="GET">
                <div class="input-group users-search">
                    <span class="input-group-text">&#128269;</span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari username atau email...">
                    <button class="btn btn-search" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="users-card">
            <div class="table-responsive">
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
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $users->firstItem() + $loop->index }}</td>
                                <td class="users-name">{{ $user->name }}</td>
                                <td class="users-email">{{ $user->email }}</td>
                                <td>
                                    <span class="role-badge role-{{ $user->role->name }}">{{ $user->role->name }}</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit-akun">
                                            Edit Akun
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-hapus" onclick="return confirm('Yakin hapus user ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="users-empty-state">
                                        <span class="icon">&#128100;</span>
                                        <div class="text">Data user tidak ditemukan.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="users-pagination">
            {{ $users->links() }}
        </div>

    </div>
@endsection