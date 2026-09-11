@extends('layouts.app')

@section('title', 'POS')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .pos-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .pos-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .pos-title {
            font-weight: 700;
            color: #2b2d6e;
            margin: 0;
        }

        .pos-subtitle {
            color: #8a8fb8;
            font-size: 0.9rem;
            margin-top: 0.15rem;
        }

        .pos-badge-mode {
            background: #eef0fd;
            color: #4a4fc0;
            font-weight: 600;
            font-size: 0.8rem;
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
        }

        .pos-card {
            background: #fff;
            border: none;
            border-radius: 18px;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .pos-card-header {
            padding: 1.1rem 1.35rem;
            border-bottom: 1px solid #f0f1fa;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pos-card-header h6 {
            margin: 0;
            font-weight: 700;
            color: #2b2d6e;
            font-size: 1rem;
        }

        .pos-card-header .count-pill {
            background: linear-gradient(135deg, #e3f7ee, #e7f6fb);
            color: #17a673;
            font-weight: 700;
            font-size: 0.78rem;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
        }

        .pos-search-wrap {
            padding: 0.9rem 1.35rem 0;
        }

        .pos-search-wrap .input-group-text {
            background: #fbfbff;
            border: 1px solid #e3e5f5;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #9aa0c9;
        }

        .pos-search-wrap input {
            border-radius: 0 10px 10px 0;
            border: 1px solid #e3e5f5;
            border-left: none;
            padding: 0.6rem 0.9rem;
        }

        .pos-search-wrap input:focus {
            border-color: #6a6fd8;
            box-shadow: none;
        }

        .pos-list {
            padding: 0.85rem 1.1rem 1.1rem;
            overflow-y: auto;
            max-height: 62vh;
        }

        .pos-list::-webkit-scrollbar {
            width: 6px;
        }

        .pos-list::-webkit-scrollbar-thumb {
            background: #d7daf2;
            border-radius: 10px;
        }

        .pos-product-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            border: 1px solid #eef0fa;
            border-radius: 12px;
            margin-bottom: 0.6rem;
            background: #fdfdff;
            transition: all .15s ease;
        }

        .pos-product-row:hover {
            border-color: #c7cbf2;
            box-shadow: 0 3px 10px rgba(74, 79, 192, 0.08);
        }

        .pos-product-img {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eceefa;
            flex-shrink: 0;
        }

        .pos-product-info {
            flex: 1;
            min-width: 0;
        }

        .pos-product-info .name {
            font-weight: 600;
            color: #2b2d6e;
            font-size: 0.93rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pos-product-info .price {
            color: #17a673;
            font-weight: 600;
            font-size: 0.83rem;
        }

        .pos-qty-input {
            width: 56px;
            border-radius: 8px;
            border: 1px solid #e3e5f5;
            text-align: center;
            padding: 0.4rem 0.25rem;
            flex-shrink: 0;
        }

        .pos-add-btn {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 9px;
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: 1.05rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pos-add-btn:hover {
            background: linear-gradient(135deg, #5a5fce, #3a3fb0);
        }

        .pos-table {
            margin-bottom: 0;
        }

        .pos-table thead th {
            background: linear-gradient(135deg, #e3f7ee, #e7f6fb);
            color: #2b2d6e;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            padding: 0.8rem 0.9rem;
        }

        .pos-table tbody td {
            vertical-align: middle;
            color: #3a3d5a;
            font-size: 0.88rem;
            padding: 0.75rem 0.9rem;
            border-color: #f2f3fa;
        }

        .pos-table .subtotal {
            font-weight: 700;
            color: #2b2d6e;
        }

        .pos-qty-cart {
            width: 60px;
            border-radius: 8px;
            border: 1px solid #e3e5f5;
            text-align: center;
            padding: 0.3rem;
        }

        .pos-delete-btn {
            border-radius: 8px;
            border: none;
            background: #fdecec;
            color: #d9534f;
            font-weight: 600;
            font-size: 0.78rem;
            padding: 0.35rem 0.7rem;
        }

        .pos-delete-btn:hover {
            background: #f9d5d5;
            color: #c9302c;
        }

        .pos-empty-state {
            text-align: center;
            padding: 2.5rem 1rem;
            color: #b3b7d6;
        }

        .pos-empty-state .icon {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }

        .pos-empty-state .text {
            font-size: 0.9rem;
        }

        .pos-footer {
            background: #fbfbff;
            border-top: 1px solid #eef0fa;
            padding: 1.25rem 1.35rem;
            margin-top: auto;
        }

        .pos-total-row {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .pos-total-label {
            color: #8a8fb8;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .pos-total-value {
            font-size: 1.6rem;
            font-weight: 800;
            color: #2b2d6e;
        }

        .pos-select {
            border-radius: 10px;
            border: 1px solid #e3e5f5;
            padding: 0.65rem 0.9rem;
        }

        .pos-checkout-btn {
            border-radius: 10px;
            background: linear-gradient(135deg, #22c58b, #17a673);
            border: none;
            font-weight: 700;
            padding: 0.75rem;
            letter-spacing: 0.2px;
            box-shadow: 0 4px 14px rgba(23, 166, 115, 0.28);
        }

        .pos-checkout-btn:hover {
            background: linear-gradient(135deg, #1cb87e, #129564);
        }

        .pos-cancel-btn {
            border-radius: 10px;
            border: 1px solid #f3c2c2;
            color: #d9534f;
            background: #fff;
            font-weight: 600;
            padding: 0.65rem;
        }

        .pos-cancel-btn:hover {
            background: #fdecec;
            color: #c9302c;
        }

        .pos-alert-error {
            background: #fdecec;
            color: #c9302c;
            border: 1px solid #f3c2c2;
            border-radius: 10px;
            padding: 0.6rem 0.9rem;
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }

        #qris-fields {
            background: #fbfbff;
            border: 1px dashed #c7cbf2;
            border-radius: 10px;
            padding: 0.9rem;
            margin-bottom: 0.75rem;
        }
    </style>

    <div class="pos-wrapper">

        <div class="pos-header">
            <div>
                <h4 class="pos-title">
                    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
                </h4>
            </div>
        </div>

        <div class="row g-3 align-items-stretch">
            <div class="col-md-6">
                <div class="pos-card">
                    <div class="pos-card-header">
                        <h6>Daftar Produk</h6>
                        <span class="count-pill">{{ $products->count() ?? 0 }} item</span>
                    </div>

                    <div class="pos-search-wrap">
                        <form method="GET" action="{{ route('penjualan.create') }}">
                            <div class="input-group">
                                <span class="input-group-text">&#128269;</span>
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                    placeholder="Cari produk..." onkeyup="this.form.submit()">
                            </div>
                        </form>
                    </div>

                    <div class="pos-list">
                        @forelse ($products as $product)
                            <form method="POST" action="{{ route('itempenjualan.store') }}" class="pos-product-row">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <img src="{{ asset('storage/' . $product->foto) }}" alt="Gambar" class="pos-product-img">

                                <div class="pos-product-info">
                                    <div class="name">{{ $product->nama }}</div>
                                    <div class="price">Rp {{ number_format($product->harga_jual) }}</div>
                                </div>

                                <input type="number" name="quantity" value="1" min="1"
                                    class="pos-qty-input {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}">

                                <button type="submit" class="pos-add-btn {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                            </form>
                        @empty
                            <div class="pos-empty-state">
                                <span class="icon">&#128230;</span>
                                <div class="text">Produk tidak ditemukan.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="pos-card">
                    <div class="pos-card-header">
                        <h6>Keranjang Belanja</h6>
                        <span class="count-pill">{{ $sale->ItemPenjualan->count() ?? 0 }} item</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table pos-table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sale->ItemPenjualan as $item)
                                    <tr>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>Rp {{ number_format($item->produk->harga_jual) }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                                @csrf @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item->kuantitas }}"
                                                    class="pos-qty-cart">
                                            </form>
                                        </td>
                                        <td class="subtotal">Rp {{ number_format($item->subtotal) }}</td>
                                        <td>
                                            @can('delete', $item)
                                            <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                                @csrf @method('DELETE')
                                                <button class="pos-delete-btn">Hapus</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="pos-empty-state">
                                                <span class="icon">&#128722;</span>
                                                <div class="text">Keranjang masih kosong.</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @php
                        $totalCart = $sale->itemPenjualan->sum('subtotal');
                    @endphp

                    <div class="pos-footer">
                        <div class="pos-total-row">
                            <span class="pos-total-label">TOTAL PEMBAYARAN</span>
                            <span class="pos-total-value">Rp {{ number_format($totalCart) }}</span>
                        </div>

                        @if (session('errors'))
                            <div class="pos-alert-error">{{ session('errors') }}</div>
                        @endif

                        <form method="POST" action="{{ route('penjualan.update', $sale->id) }}"
                            onsubmit="return confirm('Yakin ingin checkout ?')">
                            @csrf
                            @method('PUT')

                            <input type="hidden" id="total-pembayaran" value="{{ $totalCart }}">

                            <select name="payment_method" id="payment-method" class="form-select pos-select mb-2"
                                onchange="togglePaymentFields()" required>
                                <option value="">Pilih Pembayaran</option>
                                <option value="CASH">Cash</option>
                                <option value="QRIS">QRIS</option>
                            </select>

                            <div id="cash-fields" style="display:none;">
                                <input type="number" name="uang_dibayar" id="uang-dibayar"
                                    class="form-control pos-select mb-2" placeholder="Uang Diterima"
                                    min="0" oninput="hitungKembalian()">

                                <div class="pos-total-row">
                                    <span class="pos-total-label">KEMBALIAN</span>
                                    <span class="pos-total-value" id="kembalian-value">Rp 0</span>
                                </div>
                            </div>

                            <div id="qris-fields" class="text-center" style="display:none;">
                                <img src="{{ asset('images/qris-dummy2.png') }}" alt="QRIS"
                                    style="width: 180px; height: auto; margin-bottom: 0.5rem; border: 1px solid #eef0fa; border-radius: 10px; padding: 8px;">
                                <div class="text-muted" style="font-size:0.85rem;">
                                    Silakan pindai kode QRIS untuk menyelesaikan pembayaran.
                                </div>
                            </div>

                            <button class="btn pos-checkout-btn w-100 text-white {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                Checkout
                            </button>
                        </form>

                        @can('delete', $sale)
                        <form action="{{ route('penjualan.destroy', $sale->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan transaksi')">
                            @csrf
                            @method('DELETE')
                            <button
                                class="btn pos-cancel-btn w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                Batal Transaksi
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function togglePaymentFields() {
            const method = document.getElementById('payment-method').value;
            document.getElementById('cash-fields').style.display = method === 'CASH' ? 'block' : 'none';
            document.getElementById('qris-fields').style.display = method === 'QRIS' ? 'block' : 'none';
            document.getElementById('uang-dibayar').required = method === 'CASH';
            hitungKembalian();
        }

        function hitungKembalian() {
            const total = parseInt(document.getElementById('total-pembayaran').value) || 0;
            const uangDibayar = parseInt(document.getElementById('uang-dibayar').value) || 0;
            const kembalian = uangDibayar - total;

            document.getElementById('kembalian-value').textContent =
                'Rp ' + (kembalian > 0 ? kembalian.toLocaleString('id-ID') : 0);
        }
    </script>

@endsection