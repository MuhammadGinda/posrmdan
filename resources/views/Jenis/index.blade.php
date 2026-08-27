@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .jenis-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .jenis-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .jenis-header h1 {
            color: #2b2d6e;
            font-weight: 800;
            font-size: 1.7rem;
            margin: 0;
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

        .jenis-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
        }

        .jenis-table {
            margin-bottom: 0;
        }
        .jenis-table thead th {
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
        .jenis-table tbody td {
            color: #3a3d5a;
            font-size: 0.9rem;
            vertical-align: middle;
            border-color: #f2f3fa;
            padding: 0.85rem 1rem;
        }
        .jenis-table tbody tr:hover td {
            background-color: #f8f8fe;
        }

        .jenis-name {
            font-weight: 600;
            color: #2b2d6e;
        }

        .avatar-circle {
            width: 32px;
            height: 32px;
            font-size: 0.8rem;
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            color: #fff;
        }

        .creator-name {
            font-weight: 600;
            color: #3a3d5a;
            font-size: 0.85rem;
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

        .jenis-empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #b3b7d6;
        }
        .jenis-empty-state .icon {
            font-size: 2.2rem;
            display: block;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }
        .jenis-empty-state .text {
            font-weight: 600;
            font-size: 0.95rem;
        }
    </style>

    <div class="jenis-page">

        <div class="jenis-header">
            <div>
                <h1>Daftar Jenis Produk</h1>
            </div>

            <a href="{{ route('jenis.create') }}" class="btn btn-create">+ Tambah Jenis</a>
        </div>

        <div class="jenis-card">
            <div class="table-responsive">
                <table class="table jenis-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jenis</th>
                            <th scope="col">Dibuat Oleh (User)</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jenis as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="jenis-name">{{ $item->nama_jenis }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-circle rounded-circle d-flex align-items-center justify-content-center fw-bold flex-shrink-0">
                                            {{ strtoupper(substr($item->user->name ?? 'K', 0, 1)) }}
                                        </div>
                                        <span class="creator-name">
                                            {{ $item->user->name ?? 'Kasir' }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-edit-akun">
                                            Edit
                                        </a>
                                        <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="jenis-empty-state">
                                        <span class="icon">&#128230;</span>
                                        <div class="text">Data jenis belum ada.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection