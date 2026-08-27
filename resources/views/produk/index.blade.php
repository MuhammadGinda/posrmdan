@extends('layouts.app')

@section('title', 'produk')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .produk-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .produk-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .produk-header h1 {
            color: #2b2d6e;
            font-weight: 800;
            font-size: 1.7rem;
            margin: 0;
        }

        .produk-subtitle {
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

        .produk-toolbar {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(43, 45, 110, 0.08);
            padding: 1rem 1.1rem;
            margin-bottom: 1.5rem;
        }

        .produk-search .input-group-text {
            background: #fbfbff;
            border: 1px solid #e3e5f5;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #9aa0c9;
        }
        .produk-search .form-control {
            border: 1px solid #e3e5f5;
            border-left: none;
            border-right: none;
            padding: 0.6rem 0.9rem;
        }
        .produk-search .form-control:focus {
            box-shadow: none;
            border-color: #6a6fd8;
        }
        .produk-search .btn-search {
            border: 1px solid #e3e5f5;
            border-left: none;
            background: #fbfbff;
            color: #4a4fc0;
            font-weight: 600;
            border-radius: 0 10px 10px 0;
            padding: 0 1.1rem;
        }
        .produk-search .btn-search:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
            color: #fff;
        }

        /* ==== Grid produk ala e-commerce ==== */
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
        }

        .produk-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
            display: flex;
            flex-direction: column;
            transition: transform .15s ease, box-shadow .15s ease;
        }
        .produk-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(43, 45, 110, 0.14);
        }

        .produk-card-img {
            position: relative;
            width: 100%;
            padding-top: 100%; /* rasio 1:1 */
            background: #f4f5fb;
        }
        .produk-card-img img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .produk-card-img .produk-thumb-empty {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c2c5e6;
            font-size: 2.2rem;
        }

        .produk-badge-stok {
            position: absolute;
            top: 0.6rem;
            right: 0.6rem;
            background: rgba(217, 83, 79, 0.92);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.2rem 0.55rem;
            border-radius: 999px;
            letter-spacing: .02em;
        }

        .produk-card-body {
            padding: 0.9rem 1rem 1rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .produk-nama {
            font-weight: 700;
            color: #2b2d6e;
            font-size: 0.95rem;
            line-height: 1.3;
            margin-bottom: 0.15rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .produk-jenis {
            font-size: 0.76rem;
            font-weight: 600;
            color: #8a8fb8;
            background: #f3f4fc;
            display: inline-block;
            padding: 0.15rem 0.55rem;
            border-radius: 999px;
            margin-bottom: 0.55rem;
            width: fit-content;
        }

        .produk-harga-jual {
            font-weight: 800;
            color: #17a673;
            font-size: 1.05rem;
        }
        .produk-harga-beli {
            color: #b3b7d6;
            font-size: 0.78rem;
            text-decoration: line-through;
        }

        .produk-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.35rem;
            font-size: 0.78rem;
            color: #9aa0c9;
        }

        .produk-stok-info {
            font-weight: 600;
        }
        .produk-stok-info.habis {
            color: #d9534f;
        }

        .produk-card-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.85rem;
        }

        .btn-edit-produk {
            background: #eef0fd;
            border: none;
            color: #4a4fc0;
            font-weight: 600;
            font-size: 0.8rem;
            border-radius: 8px;
            padding: 0.45rem 0.7rem;
            flex: 1;
            text-align: center;
        }
        .btn-edit-produk:hover {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            color: #fff;
        }

        .btn-hapus-produk {
            background: #fdecec;
            border: none;
            color: #d9534f;
            font-weight: 600;
            font-size: 0.8rem;
            border-radius: 8px;
            padding: 0.45rem 0.7rem;
            width: 100%;
        }
        .btn-hapus-produk:hover {
            background: #f9d5d5;
            color: #c9302c;
        }

        .produk-empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #b3b7d6;
            grid-column: 1 / -1;
        }
        .produk-empty-state .icon {
            font-size: 2.2rem;
            display: block;
            margin-bottom: 0.5rem;
            opacity: 0.7;
        }
        .produk-empty-state .text {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .produk-page .pagination {
            margin-top: 1.75rem;
            justify-content: center;
        }
        .produk-page .pagination .page-link {
            color: #4a4fc0;
            border: 1px solid #e3e5f5;
        }
        .produk-page .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border-color: #6a6fd8;
        }
        .produk-page .pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="produk-page">

        <div class="produk-header">
            <div>
                <h1>Halaman Produk</h1>
            </div>

            @can('create', App\Models\Produk::class)
            <a href="{{ route('produk.create') }}" class="btn btn-create">+ Tambah Produk</a>
            @endcan
        </div>

        <div class="produk-toolbar">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group produk-search">
                    <span class="input-group-text">&#128269;</span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama produk...">
                    <button class="btn btn-search" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="produk-grid">
            @forelse ($products as $product)
                <div class="produk-card">
                    <div class="produk-card-img">
                        @if ($product->foto)
                            <img src="{{ asset('storage/'.$product->foto) }}" alt="{{ $product->nama }}">
                        @else
                            <span class="produk-thumb-empty">&#128247;</span>
                        @endif

                        @if ($product->stok == 0)
                            <span class="produk-badge-stok">Habis</span>
                        @endif
                    </div>

                    <div class="produk-card-body">
                        <div class="produk-nama">{{ $product->nama }}</div>

                        @if ($product->jenis)
                            <span class="produk-jenis">{{ $product->jenis->nama }}</span>
                        @endif

                        <div class="produk-harga-jual">Rp {{ number_format($product->harga_jual) }}</div>
                        <div class="produk-harga-beli">Rp {{ number_format($product->harga_beli) }}</div>

                        <div class="produk-meta">
                            <span class="produk-stok-info {{ $product->stok == 0 ? 'habis' : '' }}">
                                Stok: {{ $product->stok }}
                            </span>
                            <span>{{ $product->user?->name ?? '-' }}</span>
                        </div>

                        <div class="produk-card-actions">
                            @can('update', $product)
                            <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit-produk">Edit</a>
                            @endcan
                        </div>
                        @can('delete', $product)
                        <form action="{{ route('produk.destroy', $product) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-hapus-produk"
                                onclick="return confirm('Apakah anda yakin akan menghapus ini')">
                                Hapus
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            @empty
                <div class="produk-empty-state">
                    <span class="icon">&#128230;</span>
                    <div class="text">Data produk tidak tersedia.</div>
                </div>
            @endforelse
        </div>

        {{ $products->links() }}

    </div>
@endsection