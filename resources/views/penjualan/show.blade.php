@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

    @include('layouts.navbar')

    <style>
        .detail-page {
            padding: 1.5rem 0;
        }

        .detail-page h1 {
            color: #1e2a4a;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }

        .detail-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .detail-info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eef0f7;
        }
        .detail-info-row:last-child {
            border-bottom: none;
        }
        .detail-info-label {
            color: #7b81a3;
            font-weight: 600;
        }
        .detail-info-value {
            color: #33395c;
            font-weight: 700;
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

        .detail-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }
        .detail-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }
        .detail-table thead th {
            color: #4f5fe8;
            font-weight: 700;
            font-size: 0.85rem;
            border-bottom: none;
            text-transform: uppercase;
            letter-spacing: .03em;
        }
        .detail-table tbody td,
        .detail-table tbody th {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
        }

        .btn-back {
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
        }
        .btn-back:hover {
            filter: brightness(0.95);
            color: #fff;
        }

        .produk-thumb {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eef0f7;
        }
    </style>

    <div class="detail-page">
        <h1>Detail Penjualan</h1>

        <div class="detail-card">
            <div class="detail-info-row">
                <span class="detail-info-label">Tanggal Transaksi</span>
                <span class="detail-info-value">{{ $penjualan->created_at->translatedFormat('d-m-Y H:i:s') }}</span>
            </div>
            <div class="detail-info-row">
                <span class="detail-info-label">Kasir</span>
                <span class="detail-info-value">{{ $penjualan->user?->name ?? '-' }}</span>
            </div>
            <div class="detail-info-row">
                <span class="detail-info-label">Metode Pembayaran</span>
                <span class="detail-info-value">{{ $penjualan->metode_pembayaran }}</span>
            </div>
            <div class="detail-info-row">
                <span class="detail-info-label">Status</span>
                <span class="detail-info-value">
                    <span class="status-badge status-{{ strtolower($penjualan->status) === 'completed' ? 'completed' : (strtolower($penjualan->status) === 'open' ? 'open' : 'default') }}">
                        {{ $penjualan->status }}
                    </span>
                </span>
            </div>
            <div class="detail-info-row">
                <span class="detail-info-label">Total Pembayaran</span>
                <span class="detail-info-value">Rp.{{ number_format($penjualan->total_pembayaran) }}</span>
            </div>
        </div>

        <table class="table detail-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penjualan->itemPenjualan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            @if ($item->produk?->foto)
                                <img src="{{ asset('storage/' . $item->produk->foto) }}"
                                    alt="{{ $item->produk->nama }}" class="produk-thumb">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->produk->nama ?? '-' }}</td>
                        <td>{{ $item->kuantitas }}</td>
                        <td>Rp.{{ number_format($item->subtotal) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada item</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('penjualan.index') }}" class="btn btn-back mt-3">Kembali</a>
    </div>

@endsection