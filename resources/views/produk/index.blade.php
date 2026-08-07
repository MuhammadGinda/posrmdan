@extends('layouts.app')

@section('title', 'produk')

@section('content')

    @include('layouts.navbar')

    <style>
        .produk-page {
            padding: 1.5rem 0;
        }

        .produk-page h1 {
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

        .produk-search .form-control {
            border: 1px solid #e1e4f7;
            border-right: none;
        }
        .produk-search .form-control:focus {
            box-shadow: none;
            border-color: #4f5fe8;
        }
        .produk-search .btn-outline-secondary {
            border: 1px solid #e1e4f7;
            border-left: none;
            background-color: #fff;
            color: #4f5fe8;
            font-weight: 600;
        }
        .produk-search .btn-outline-secondary:hover {
            background: linear-gradient(90deg, #4f5fe8, #17b6a7);
            border-color: #4f5fe8;
            color: #fff;
        }

        .produk-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(79, 95, 232, 0.08);
            background-color: #ffffff;
        }
        .produk-table thead {
            background: linear-gradient(90deg, #eef0fd, #e6f6f4);
        }
        .produk-table thead th {
            color: #4f5fe8;
            font-weight: 700;
            font-size: 0.85rem;
            border-bottom: none;
            text-transform: uppercase;
            letter-spacing: .03em;
        }
        .produk-table tbody td,
        .produk-table tbody th {
            color: #33395c;
            vertical-align: middle;
            border-color: #eef0f7;
        }
        .produk-table tbody tr:hover td,
        .produk-table tbody tr:hover th {
            background-color: #f7f8fe;
        }
        .produk-table .img-thumbnail {
            border-color: #e1e4f7;
            border-radius: 8px;
        }
        .produk-table .empty-state {
            color: #a3aac6;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
            padding: 1.5rem 0;
        }

        .btn-edit-produk {
            background-color: #ffb020;
            border: none;
            color: #3a2a00;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-edit-produk:hover {
            background-color: #eba00f;
            color: #3a2a00;
        }

        .btn-hapus-produk {
            background-color: #e5484d;
            border: none;
            font-weight: 600;
            border-radius: 6px;
        }
        .btn-hapus-produk:hover {
            background-color: #cf3e42;
        }

        .produk-page .pagination .page-link {
            color: #4f5fe8;
            border: 1px solid #e1e4f7;
        }
        .produk-page .pagination .page-item.active .page-link {
            background-color: #4f5fe8;
            border-color: #4f5fe8;
        }
        .produk-page .pagination .page-link:hover {
            background-color: #eef0fd;
        }
    </style>

    <div class="produk-page">
        <h1>Halaman Produk</h1>

        @can('create', App\Models\Produk::class)
        <a href="{{ route('produk.create') }}" method="GET" class="btn btn-create mb-3">create</a>
        @endcan

        <form action="{{ route('produk.index') }}" method="GET" class="mb-3">
            <div class="input-group produk-search">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search nama produk">

                <button class="btn btn-outline-secondary" type="submit">
                    Search
                </button>
            </div>
        </form>

        <table class="table produk-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga beli</th>
                    <th scope="col">Harga jual</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                        <td>{{ $product->user?->name ?? '-' }}</td>
                        <td>
                            @if ($product->foto)
                                <img src="{{ asset('storage/'.$product->foto) }}"
                                    width="100"
                                    class="img-thumbnail">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->harga_beli }}</td>
                        <td>{{ $product->harga_jual }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>
                            <div class="d-flex gap-1 align-items-center">
                                @can('update', $product)
                                <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit-produk">Edit</a>
                                @endcan
                                <span>||</span>
                                @can('delete', $product)
                                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-hapus-produk"
                                        onclick="return confirm('Apaakan anda yakin akan menghapus ini')">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">Data tidak tersedia.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
@endsection