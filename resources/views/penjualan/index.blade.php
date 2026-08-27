@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .penjualan-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .penjualan-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .penjualan-header h1 {
            color: #2b2d6e;
            font-weight: 800;
            font-size: 1.7rem;
            margin: 0;
        }

        .penjualan-subtitle {
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

        .penjualan-toolbar {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(43, 45, 110, 0.08);
            padding: 1rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .penjualan-search .input-group-text {
            background: #fbfbff;
            border: 1px solid #e3e5f5;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #9aa0c9;
        }
        .penjualan-search .form-control {
            border: 1px solid #e3e5f5;
            border-left: none;
            border-right: none;
            padding: 0.6rem 0.9rem;
        }
        .penjualan-search .form-control:focus {
            box-shadow: none;
            border-color: #6a6fd8;
        }
        .penjualan-search .btn-search {
            border: 1px solid #e3e5f5;
            border-left: none;
            background: #fbfbff;
            color: #4a4fc0;
            font-weight: 600;
            border-radius: 0 10px 10px 0;
            padding: 0 1.1rem;
        }
        .penjualan-search .btn-search:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
            color: #fff;
        }

        .penjualan-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
        }

        .penjualan-table {
            margin-bottom: 0;
        }
        .penjualan-table thead th {
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
        .penjualan-table tbody td,
        .penjualan-table tbody th {
            color: #3a3d5a;
            font-size: 0.9rem;
            vertical-align: middle;
            border-color: #f2f3fa;
            padding: 0.85rem 1rem;
        }
        .penjualan-table tbody tr:hover td,
        .penjualan-table tbody tr:hover th {
            background-color: #f8f8fe;
        }

        .penjualan-total {
            font-weight: 700;
            color: #17a673;
        }

        .penjualan-kasir {
            color: #4a4fc0;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: .03em;
        }
        .status-badge.status-completed {
            background: #e3f7ee;
            color: #17a673;
        }
        .status-badge.status-open {
            background: #fff3e0;
            color: #c77700;
        }
        .status-badge.status-default {
            background: #eef0fd;
            color: #4a4fc0;
        }

        .btn-detail-penjualan {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border: none;
            color: #fff;
            font-weight: 600;
            font-size: 0.82rem;
            border-radius: 8px;
            padding: 0.4rem 0.9rem;
        }
        .btn-detail-penjualan:hover {
            background: linear-gradient(135deg, #5a5fce, #3a3fb0);
            color: #fff;
        }

        .btn-edit-penjualan {
            background: #eef0fd;
            border: none;
            color: #4a4fc0;
            font-weight: 600;
            font-size: 0.82rem;
            border-radius: 8px;
            padding: 0.4rem 0.85rem;
        }
        .btn-edit-penjualan:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            color: #fff;
        }

        .btn-hapus-penjualan {
            background: #fdecec;
            border: none;
            color: #d9534f;
            font-weight: 600;
            font-size: 0.82rem;
            border-radius: 8px;
            padding: 0.4rem 0.85rem;
        }
        .btn-hapus-penjualan:hover {
            background: #f9d5d5;
            color: #c9302c;
        }

        .penjualan-empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #b3b7d6;
        }
        .penjualan-empty-state .icon {
            font-size: 2.2rem;
            display: block;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }
        .penjualan-empty-state .text {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .penjualan-page .pagination {
            margin-top: 1.25rem;
        }
        .penjualan-page .pagination .page-link {
            color: #4a4fc0;
            border: 1px solid #e3e5f5;
        }
        .penjualan-page .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
        }
        .penjualan-page .pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="penjualan-page">

        <div class="penjualan-header">
            <div>
                <h1>Halaman Penjualan</h1>
            </div>

            <a href="{{ route('penjualan.create') }}" class="btn btn-create">+ Tambah Penjualan</a>
        </div>

        <div class="penjualan-toolbar">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="input-group penjualan-search">
                    <span class="input-group-text">&#128269;</span>
                    <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                        placeholder="Cari penjualan...">
                    <button class="btn btn-search" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="penjualan-card">
            <div class="table-responsive">
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
                                <td class="penjualan-kasir">{{ $sale->user?->name ?? '-' }}</td>
                                <td class="penjualan-total">Rp {{ number_format($sale->total_pembayaran) }}</td>
                                <td>{{ $sale->metode_pembayaran }}</td>
                                <td>
                                    <span class="status-badge status-{{ strtolower($sale->status) === 'completed' ? 'completed' : (strtolower($sale->status) === 'open' ? 'open' : 'default') }}">
                                        {{ $sale->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-detail-penjualan">Detail</a>
                                        @can('view', $sale)
                                            <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-edit-penjualan">Edit</a>
                                        @endcan
                                        @can('delete', $sale)
                                            <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-hapus-penjualan"
                                                    onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="penjualan-empty-state">
                                        <span class="icon">&#128230;</span>
                                        <div class="text">Data tidak ditemukan.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{ $sales->links() }}

    </div>

@endsection