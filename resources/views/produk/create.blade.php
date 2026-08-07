@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    @include('layouts.navbar')
    <style>
        .produk-form-page h4 {
            color: #1e2a4a;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }
    </style>

    <div class="container produk-form-page">
        <h4>Tambah Produk</h4>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @include('Produk._form')
        </form>
    </div>
@endsection