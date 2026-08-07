@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

    @include('layouts.navbar')

    <style>
        .penjualan-page {
            padding: 1.5rem 0;
        }

        .penjualan-page h1 {
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

        .penjualan-search .form-control {
            border: 1px solid #e1e4f7;
            border-right: none;
        }
        .penjualan-search .form-control:focus {
            box-shadow: none;
            border-color: #4f5fe8;
        }
        .penjualan-search .btn-outline-secondary {
            border: 1px solid #e1e4f7;
            border-left: none;
            background-color: #fff;
            color: #4f5fe8;
            font-weight: 600;
        }
        .penjualan-search .btn-outline-secondary:hover {
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
            border-color: #4f5fe8;
            color: #fff;
        }

        .penjualan-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }
        .penjualan-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }
        .penjualan-table thead th {
            color: #4f5fe8;
            font-weight: 700;
            font-size: 0.85rem;
            border-bottom: none;
            text-transform: uppercase;
            letter-spacing: .03em;
        }
        .penjualan-table tbody td,
        .penjualan-table tbody th {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
        }
        .penjualan-table tbody tr:hover td,
        .penjualan-table tbody tr:hover th {
            background-color: #f7f8fe;
        }
        .penjualan-table .empty-state {
            color: #a3aac6;
            font-weight: 600;
            text-align: center;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: .02em;
        }
        .status-badge.status-completed {
            background-color: #e6f6f4;
            color: #0f9c8f;
        }
        .status-badge.status-open {
            background-color: #fff4e0;
            color: #b7791f;
        }
        .status-badge.status-default {
            background-color: #eef0fd;
            color: #4f5fe8;
        }

        .btn-detail-penjualan {
            background: linear-gradient(90deg, #4f5fe8, #6a7bf0);
            border: none;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-detail-penjualan:hover {
            filter: brightness(0.95);
            color: #fff;
        }

        .btn-edit-penjualan {
            background-color: #ffb020;
            border: none;
            color: #3a2a00;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-edit-penjualan:hover {
            background-color: #eba00f;
            color: #3a2a00;
        }

        .btn-hapus-penjualan {
            background-color: #e5484d;
            border: none;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-hapus-penjualan:hover {
            background-color: #cf3e42;
        }

        .penjualan-page .pagination .page-link {
            color: #4f5fe8;
            border: 1px solid #e1e4f7;
        }
        .penjualan-page .pagination .page-item.active .page-link {
            background-color: #4f5fe8;
            border-color: #4f5fe8;
        }
        .penjualan-page .pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="penjualan-page">
        <h1>Halaman penjualan</h1>

        <a href="{{ route('penjualan.create') }}" class="btn btn-create mb-3">Create</a>

        <form action="{{ route('penjualan.index') }}" method="GET" class="mb-3">
            <div class="input-group penjualan-search">
                <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                    placeholder="Search penjualan">
                <button class="btn btn-outline-secondary" type="submit">
                    Search
                </button>
            </div>
        </form>

        <table class="table penjualan-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Kasir</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sales as $sale)
                    <tr>
                        <th scope="row">{{ $sales->firstItem() + $loop->index }}</th>
                        <td>{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
                        <td>{{ $sale->user?->name ?? '-' }}</td>
                        <td>Rp.{{ number_format($sale->total_pembayaran) }}</td>
                        <td>{{ $sale->metode_pembayaran }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($sale->status) === 'completed' ? 'completed' : (strtolower($sale->status) === 'open' ? 'open' : 'default') }}">
                                {{ $sale->status }}
                            </span>
                        </td>
                        <td class="d-flex gap-1 align-items-center">
                            <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-detail-penjualan">Detail</a>
                            @can('view', $sale)
                                ||
                                <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-edit-penjualan">Edit</a>
                            @endcan
                            @can('delete', $sale)
                                ||
                                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-hapus-penjualan"
                                        onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-state">Data Tidak Ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $sales->links() }}
    </div>

@endsection