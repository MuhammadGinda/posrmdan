<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Login')

<!-- batas awal isi konten -->
@section('content')
    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(160deg, #f5f7fb 0%, #eef1fb 45%, #eaf3f2 100%);
        }

        .page-heading {
            color: #1e2a4a;
            font-weight: 700;
        }

        .page-heading small {
            color: #8b93b8 !important;
            font-weight: 400;
        }

        .section-title {
            color: #1e2a4a;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
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

        .dashboard-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.1);
            margin-bottom: 1.5rem;
            overflow: hidden;
            background-color: #ffffff;
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(79, 95, 232, 0.16);
        }

        .dashboard-card .card-header {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
            color: #4f5fe8;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: none;
            padding: 0.9rem 1.1rem;
            letter-spacing: .02em;
        }

        .dashboard-card .card-body {
            padding: 1.1rem;
        }

        .dashboard-card .card-title {
            color: #1e2a4a;
            font-weight: 700;
            margin: 0;
        }

        .dashboard-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }

        .dashboard-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }

        .dashboard-table thead th {
            color: #4f5fe8;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: none;
        }

        .dashboard-table tbody td {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
        }

        .dashboard-table tbody tr:hover td {
            background-color: #f7f8fe;
        }

        .dashboard-table .text-muted {
            color: #a3aac6 !important;
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

    <div class="text-center">
        <h1 class="page-heading">
            Ringkasan Hari Ini
            <small class="text-muted">
                ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})

            </small>
        </h1>
        <div class="row">
            @can('viewAny', App\Models\User::class)
                <div class="col-md-12">
                    <h1 class="section-title">Today's Sales</h1>
                </div>
                <div class="col-md-6">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            Total Nilai Penjualan Hari Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ number_format($ringkasan['total_penjualan']) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            Jumlah Transaksi Hari Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h1 class="section-title">Cash & Payment Status</h1>
                </div>
                <div class="col-md-6">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            Total Pembayaran tunai
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ number_format($ringkasan['total_cash']) }}</h5>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card dashboard-card">
                        <div class="card-header">
                            Total pembayaran non-tunai
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ number_format($ringkasan['total_non_tunai']) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="section-title">Critical Inventory Status</h1>
            </div>
            <div class="col-md-6">
                <h3 class="section-title" style="font-size: 1.1rem;">Daftar produk stok rendah</h3>
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkStokRendah as $index => $produk)
                            <tr>
                                <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted text-center">
                                    Seluruh produk berada dalam stok aman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $produkStokRendah->links() }}
            </div>
            <div class="col-md-6">
                <h3 class="section-title" style="font-size: 1.1rem;">Produk habis stok</h3>
                <table class="table dashboard-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produkStokHabis as $index => $produk)
                            <tr>
                                <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted text-center">
                                    Seluruh produk berada dalam stok aman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $produkStokRendah->links() }}
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="section-title">Best Seller Products</h1>
        </div>
        <div class="col-md-12 text-center">
            <table class="table dashboard-table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Unit Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkTerlaris as $produk)
                        <tr>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->total_terjual }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
    </div>




    <form method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    <!-- batas akhir isi konten -->
@endsection
