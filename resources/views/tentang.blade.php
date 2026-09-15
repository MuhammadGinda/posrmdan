@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@include('layouts.navbar')

<style>
    .card-custom {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 25px 30px;
        margin-bottom: 25px;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
        height: calc(100% - 25px);
    }
    .header-card {
        text-align: center;
        padding: 30px 20px;
        height: auto;
    }
    .header-card h1 {
        color: #1e293b;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    .header-card p {
        color: #64748b;
        font-size: 14px;
        margin: 0;
    }
    .section-title {
        text-align: center;
        color: #1e293b;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .section-title i {
        color: #4f46e5;
    }
    .section-title span {
        border-bottom: 2px solid #4f46e5;
        padding-bottom: 4px;
    }
    .info-box {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
    }
    .info-icon {
        background-color: #e0e7ff;
        color: #4f46e5;
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .info-text h4 {
        color: #1e293b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 3px;
    }
    .info-text p {
        color: #64748b;
        font-size: 13px;
        line-height: 1.5;
        margin: 0;
    }

    /* Styling Kartu Foto Perusahaan di Sisi Kiri */
    .company-card {
        text-align: center;
        padding: 20px;
    }
    .company-img {
        width: 100%;
        height: 240px; /* Diperbesar agar tampil menonjol */
        border-radius: 12px;
        object-fit: cover;
        border: 3px solid #e0e7ff;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
    }
    .company-name {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2px;
    }
    .company-tagline {
        color: #4f46e5;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    /* Styling Tombol Kembali di Kiri Bawah */
    .btn-back-container {
        margin-top: 10px;
        margin-bottom: 30px;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background-color: #ffffff;
        color: #475569;
        border: 1px solid #cbd5e1;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 4px rgba(0,0,0,0.03);
    }
    .btn-back:hover {
        background-color: #4f46e5;
        color: #ffffff;
        border-color: #4f46e5;
    }
</style>

<div class="container my-4">
    <!-- Header Banner -->
    <div class="card-custom header-card">
        <h1>Tentang Perusahaan</h1>
        <p>Mengenal lebih dekat Toko Ginda dan Layanan Kami</p>
    </div>

    <!-- Seksi Profil Perusahaan & Pengembang -->
    <div class="section-title">
        <i class="fa-solid fa-store"></i>
        <span>Profil & Informasi Toko</span>
    </div>

    <div class="row align-items-stretch">
        <!-- Kartu Foto Perusahaan (Sisi Kiri - Ukuran col-md-6) -->
        <div class="col-md-6">
            <div class="card-custom company-card">
                <!-- Foto Fashion Retail Store dari Unsplash -->
                <img src="{{ asset('images/toko.jpg') }}" alt="Foto Toko Fashion Ginda" class="company-img" onerror="this.src='https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&q=80'">
                <div class="company-name">TOKO GINDA</div>
                <div class="company-tagline">Pusat Ritel & Fashion Terpercaya</div>
                <p class="text-muted" style="font-size: 12px; margin: 0;">Didirikan dan dikembangkan oleh <strong>Muhammad Ginda Ramdani</strong> untuk melayani kebutuhan retail terbaik.</p>
            </div>
        </div>

        <!-- Informasi Perusahaan (Sisi Kanan - Ukuran col-md-6) -->
        <div class="col-md-6">
            <div class="card-custom">
                <div class="info-box">
                    <div class="info-icon"><i class="fa-solid fa-building"></i></div>
                    <div class="info-text">
                        <h4>Tentang TOKO GINDA</h4>
                        <p>TOKO GINDA adalah pusat perbelanjaan ritel yang menyediakan berbagai produk fashion, sepatu (seperti Adidas, dll), serta barang-barang kebutuhan berkualitas dengan harga terjangkau.</p>
                    </div>
                </div>
                <div class="info-box mb-0">
                    <div class="info-icon"><i class="fa-solid fa-box-open"></i></div>
                    <div class="info-text">
                        <h4>Produk yang Dijual</h4>
                        <p>Kami menjual berbagai kategori produk terkemuka, mulai dari Sepatu Olahraga/Casual, Pakaian, Aksesori Fashion, hingga Produk Kebutuhan Harian.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Seksi Lokasi & Kontak -->
    <div class="section-title">
        <i class="fa-solid fa-location-dot"></i>
        <span>Lokasi & Kontak</span>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card-custom">
                <div class="info-box">
                    <div class="info-icon"><i class="fa-solid fa-map-marked-alt"></i></div>
                    <div class="info-text">
                        <h4>Alamat Toko</h4>
                        <p>Jl. Bebedahan Kp Silih Asih No. 123, Belakang Nany Salon</p>
                    </div>
                </div>
                <div class="info-box mb-0">
                    <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="info-text">
                        <h4>Jam Operasional</h4>
                        <p>Senin - Minggu: 08.00 - 21.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-custom">
                <div class="info-box">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="info-text">
                        <h4>Telepon / WhatsApp</h4>
                        <p>+62 812-3456-7890</p>
                    </div>
                </div>
                <div class="info-box mb-0">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="info-text">
                        <h4>Email Resmi</h4>
                        <p>info@tokoginda.com / support@tokoginda.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection