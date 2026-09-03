<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')
    @include('layouts.navbar')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(160deg, #f5f7fb 0%, #eef1fb 45%, #eaf3f2 100%);
        }

        .dashboard-wrapper {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem 4rem;
        }

        .page-header-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.1);
            padding: 1.75rem 2rem;
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .page-heading {
            color: #1e2a4a;
            font-weight: 700;
            margin: 0;
            font-size: 1.9rem;
        }

        .page-heading small {
            display: block;
            color: #8b93b8 !important;
            font-weight: 400;
            font-size: 1rem;
            margin-top: 0.35rem;
        }

        .dashboard-section {
            margin-bottom: 3rem;
        }

        .dashboard-section:last-child {
            margin-bottom: 0;
        }

        .section-title-row {
            text-align: center;
        }

        .section-title {
            color: #1e2a4a;
            font-weight: 700;
            font-size: 1.35rem;
            margin-bottom: 1.25rem;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding-bottom: 0.4rem;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 48px;
            height: 3px;
            border-radius: 3px;
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
        }

        .section-title .bi {
            color: #4f5fe8;
            font-size: 1.15rem;
        }

        .subsection-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #1e2a4a;
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 0.9rem;
            padding-left: 0.75rem;
            border-left: 4px solid #4f5fe8;
        }

        .subsection-title .bi {
            color: #4f5fe8;
            font-size: 1rem;
        }

        .subsection-title.accent-teal {
            border-left-color: #17b6a7;
        }

        .subsection-title.accent-teal .bi {
            color: #17b6a7;
        }

        .dashboard-card {
            height: 100%;
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.1);
            overflow: hidden;
            background-color: #ffffff;
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(79, 95, 232, 0.16);
        }

        .dashboard-card .card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
            color: #4f5fe8;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: none;
            padding: 0.9rem 1.1rem;
            letter-spacing: .02em;
        }

        .dashboard-card .card-header .bi {
            font-size: 1rem;
        }

        .dashboard-card .card-body {
            padding: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.9rem;
            min-height: 88px;
        }

        .card-icon-badge {
            flex-shrink: 0;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #4f5fe8;
            background: linear-gradient(135deg, #eef0fd, #e6f6f4);
        }

        .dashboard-card .card-title {
            color: #1e2a4a;
            font-weight: 700;
            margin: 0;
            font-size: 1.6rem;
        }

        .dashboard-card.card-primary .card-title {
            font-size: 2rem;
        }

        .table-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }

        .dashboard-table {
            table-layout: fixed;
        }

        .dashboard-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }

        .dashboard-table thead th {
            color: #4f5fe8;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: none;
            padding: 0.85rem 1rem;
        }

        .dashboard-table thead th .bi {
            margin-right: 0.35rem;
        }

        .dashboard-table tbody td {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
            padding: 0.75rem 1rem;
        }

        .dashboard-table th.col-index,
        .dashboard-table td.col-index {
            width: 8%;
        }

        .dashboard-table th.col-name,
        .dashboard-table td.col-name {
            width: 50%;
        }

        .dashboard-table th.col-numeric,
        .dashboard-table td.col-numeric {
            width: 21%;
            text-align: center;
        }

        .dashboard-table tbody tr:hover td {
            background-color: #f7f8fe;
        }

        .dashboard-table .empty-state {
            color: #a3aac6 !important;
            padding: 1.75rem 1rem;
        }

        .dashboard-table .empty-state .bi {
            display: block;
            font-size: 1.6rem;
            margin-bottom: 0.4rem;
            color: #17b6a7;
        }

        .pagination {
            justify-content: center;
            margin-top: 1rem;
        }

        .pagination .page-link {
            color: #4f5fe8;
            border: 1px solid #e1e4f7;
        }

        .pagination .page-item.active .page-link {
            background-color: #4f5fe8;
            border-color: #4f5fe8;
            color: #ffffff;
        }

        .pagination .page-link:hover {
            background-color: #eef0fd;
            color: #33395c;
        }
    </style>

    <div class="dashboard-wrapper">

        <div class="page-header-card">
            <h1 class="page-heading">
                Ringkasan Hari Ini
                <small>({{ $tanggalHariIni->translatedFormat('l, d F Y') }})</small>
            </h1>
        </div>

        @can('viewAny', App\Models\User::class)
            <div class="dashboard-section">
                <div class="section-title-row">
                    <h2 class="section-title"><i class="bi bi-graph-up-arrow"></i> Today's Sales</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card dashboard-card card-primary">
                            <div class="card-header"><i class="bi bi-cash-stack"></i> Total Nilai Penjualan Hari Ini</div>
                            <div class="card-body">
                                <div class="card-icon-badge"><i class="bi bi-currency-exchange"></i></div>
                                <h3 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-header"><i class="bi bi-receipt"></i> Jumlah Transaksi Hari Ini</div>
                            <div class="card-body">
                                <div class="card-icon-badge"><i class="bi bi-cart-check"></i></div>
                                <h3 class="card-title">{{ $ringkasan['total_transaksi'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-section">
                <div class="section-title-row">
                    <h2 class="section-title"><i class="bi bi-wallet2"></i> Cash & Payment Status</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-header"><i class="bi bi-cash"></i> Total Pembayaran Tunai</div>
                            <div class="card-body">
                                <div class="card-icon-badge"><i class="bi bi-cash-coin"></i></div>
                                <h3 class="card-title">Rp {{ number_format($ringkasan['total_cash']) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card dashboard-card">
                            <div class="card-header"><i class="bi bi-credit-card"></i> Total Pembayaran Non-Tunai</div>
                            <div class="card-body">
                                <div class="card-icon-badge"><i class="bi bi-credit-card-2-back"></i></div>
                                <h3 class="card-title">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <div class="dashboard-section">
            <div class="section-title-row">
                <h2 class="section-title"><i class="bi bi-box-seam"></i> Critical Inventory Status</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <h3 class="subsection-title"><i class="bi bi-exclamation-triangle"></i> Daftar Produk Stok Rendah</h3>
                    <div class="table-card">
                        <div class="table-responsive">
                            <table class="table dashboard-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-index">#</th>
                                        <th scope="col" class="col-name">Nama</th>
                                        <th scope="col" class="col-numeric">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produkStokRendah as $index => $produk)
                                        <tr>
                                            <td class="col-index">{{ $produkStokRendah->firstItem() + $index }}</td>
                                            <td class="col-name">{{ $produk->nama }}</td>
                                            <td class="col-numeric">{{ $produk->stok }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="empty-state text-center">
                                                <i class="bi bi-check-circle"></i>
                                                Seluruh produk berada dalam stok aman.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $produkStokRendah->links() }}
                </div>

                <div class="col-md-6">
                    <h3 class="subsection-title accent-teal"><i class="bi bi-x-circle"></i> Produk Habis Stok</h3>
                    <div class="table-card">
                        <div class="table-responsive">
                            <table class="table dashboard-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-index">#</th>
                                        <th scope="col" class="col-name">Nama</th>
                                        <th scope="col" class="col-numeric">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produkStokHabis as $index => $produk)
                                        <tr>
                                            <td class="col-index">{{ $produkStokHabis->firstItem() + $index }}</td>
                                            <td class="col-name">{{ $produk->nama }}</td>
                                            <td class="col-numeric">{{ $produk->stok }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="empty-state text-center">
                                                <i class="bi bi-check-circle"></i>
                                                Seluruh produk berada dalam stok aman.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $produkStokHabis->links() }}
                </div>
            </div>
        </div>

        <div class="dashboard-section">
            <div class="section-title-row">
                <h2 class="section-title"><i class="bi bi-trophy"></i> Best Seller Products</h2>
            </div>
            <div class="table-card">
                <div class="table-responsive">
                    <table class="table dashboard-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="col-name">Nama</th>
                                <th scope="col" class="col-numeric">Stok</th>
                                <th scope="col" class="col-numeric">Unit Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkTerlaris as $produk)
                                <tr>
                                    <td class="col-name">{{ $produk->nama }}</td>
                                    <td class="col-numeric">{{ $produk->stok }}</td>
                                    <td class="col-numeric">{{ $produk->total_terjual }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty-state text-center">
                                        <i class="bi bi-check-circle"></i>
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    <!-- batas akhir isi konten -->
@endsection