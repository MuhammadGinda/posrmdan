@extends('layouts.app')

@section('title','Edit Produk')

@section('content')
    <style>
        .produk-form-page h4 {
            color: #1e2a4a;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }
    </style>

    <div class="container produk-form-page">
        <h4>Edit Produk</h4>

        <form action="{{ route('produk.update', $produk) }}"
              method="POST"
              enctype="multipart/form-data">
              @method('PUT')
        @include('produk._form')
        </form>
    </div>
@endsection