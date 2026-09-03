@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')

    @include('layouts.navbar')

    <style>
        body {
            background: linear-gradient(135deg, #eef0fb 0%, #eaf3fb 100%);
        }

        .jenis-form-page {
            max-width: 700px;
            margin: 0 auto;
            padding: 1.75rem 1rem 3rem;
        }

        .jenis-form-header {
            margin-bottom: 1.5rem;
        }

        .jenis-form-header h1 {
            color: #2b2d6e;
            font-weight: 800;
            font-size: 1.7rem;
            margin: 0;
        }

        .jenis-form-card {
            background: #fff;
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 6px 24px rgba(43, 45, 110, 0.09);
        }

        .jenis-form-card .form-label {
            color: #2b2d6e;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: .03em;
            margin-bottom: 0.5rem;
        }

        .jenis-form-card .form-control {
            border: 1px solid #e3e5f7;
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            font-size: 0.95rem;
            color: #3a3d5a;
            transition: all .15s ease;
        }
        .jenis-form-card .form-control:focus {
            border-color: #6a6fd8;
            box-shadow: 0 0 0 0.2rem rgba(106, 111, 216, 0.15);
        }

        .btn-simpan {
            background: linear-gradient(135deg, #6a6fd8, #4a4fc0);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.6rem 1.6rem;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(74, 79, 192, 0.28);
            transition: all .15s ease;
        }
        .btn-simpan:hover {
            background: linear-gradient(135deg, #5a5fce, #3a3fb0);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-kembali {
            background: #eef0fd;
            border: none;
            color: #4a4fc0;
            font-weight: 600;
            padding: 0.6rem 1.6rem;
            border-radius: 10px;
            transition: all .15s ease;
        }
        .btn-kembali:hover {
            background: #dfe1fb;
            color: #3a3fb0;
        }
    </style>

    <div class="jenis-form-page">

        <div class="jenis-form-header">
            <h1>Tambah Jenis</h1>
        </div>

        <div class="jenis-form-card">
            <form action="{{ route('jenis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('jenis._form', ['jenis' => null])
            </form>
        </div>

    </div>
@endsection