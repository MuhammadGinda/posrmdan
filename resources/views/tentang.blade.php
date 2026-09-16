@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@include('layouts.navbar')

<style>
    .card-custom {
        background-color: #ffffff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
    }

    .section-title {
        color: #1e293b;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-title i {
        color: #4f46e5;
        font-size: 13px;
        background-color: #e0e7ff;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .section-title span {
        border-bottom: 2px solid #4f46e5;
        padding-bottom: 3px;
    }

    /* Kartu profil terpusat: judul halaman + foto + identitas jadi satu */
    .profile-hero {
        text-align: center;
        padding: 35px 20px 30px 20px;
        margin-bottom: 25px;
    }
    .profile-hero h1 {
        color: #1e293b;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .profile-hero > p.subtitle {
        color: #64748b;
        font-size: 13.5px;
        margin: 0 0 22px 0;
    }
    .company-img {
        width: 100%;
        max-width: 260px;
        aspect-ratio: 1 / 1;
        border-radius: 12px;
        object-fit: cover;
        border: 3px solid #e0e7ff;
        margin: 0 auto 16px auto;
        display: block;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
    }
    .company-name {
        font-size: 17px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2px;
    }
    .company-tagline {
        color: #4f46e5;
        font-size: 12.5px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .company-desc {
        color: #64748b;
        font-size: 12.5px;
        line-height: 1.5;
        max-width: 480px;
        margin: 0 auto;
    }

    /* Dua kartu info berdampingan, ikon di atas, rata tengah */
    .info-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }
    @media (max-width: 767px) {
        .info-row { grid-template-columns: 1fr; }
    }
    .info-card {
        padding: 24px 22px;
        text-align: center;
    }
    .info-icon {
        background-color: #e0e7ff;
        color: #4f46e5;
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin: 0 auto 14px auto;
    }
    .info-card h4 {
        color: #1e293b;
        font-size: 14.5px;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .info-card p {
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
        margin: 0;
    }

    /* Kontak: grid sejajar 4 kartu, gaya sama seperti info-card di atas */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    @media (max-width: 991px) {
        .contact-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 575px) {
        .contact-grid { grid-template-columns: 1fr; }
    }
    .contact-card {
        padding: 24px 20px;
        text-align: center;
    }
    .contact-card h4 {
        color: #1e293b;
        font-size: 13.5px;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .contact-card p {
        color: #64748b;
        font-size: 12.5px;
        line-height: 1.5;
        margin: 0;
    }

    .btn-back-container {
        margin-top: 30px;
        margin-bottom: 10px;
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

    <!-- Kartu profil terpusat: judul + foto + identitas toko jadi satu kesatuan -->
    <div class="card-custom profile-hero">
        <h1>Tentang Perusahaan</h1>
        <p class="subtitle">Mengenal lebih dekat Toko Ginda dan Layanan Kami</p>

        <img src="{{ asset('images/toko.jpg') }}" alt="Foto Toko Fashion Ginda" class="company-img" onerror="this.src='https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&q=80'">
        <div class="company-name">TOKO GINDA</div>
        <div class="company-tagline">Pusat Ritel & Fashion Terpercaya</div>
        <p class="company-desc">Didirikan dan dikembangkan oleh <strong>Muhammad Ginda Ramdani</strong> untuk melayani kebutuhan retail terbaik.</p>
    </div>

    <!-- Seksi Informasi Toko: dua kartu berdampingan -->
    <div class="section-title">
        <i class="fa-solid fa-store"></i>
        <span>Informasi Toko</span>
    </div>

    <div class="info-row">
        <div class="card-custom info-card">
            <div class="info-icon"><i class="fa-solid fa-building"></i></div>
            <h4>Tentang TOKO GINDA</h4>
            <p>TOKO GINDA adalah pusat perbelanjaan ritel yang menyediakan berbagai produk fashion, sepatu (seperti Adidas, dll), serta barang-barang kebutuhan berkualitas dengan harga terjangkau.</p>
        </div>
        <div class="card-custom info-card">
            <div class="info-icon"><i class="fa-solid fa-box-open"></i></div>
            <h4>Produk yang Dijual</h4>
            <p>Kami menjual berbagai kategori produk terkemuka, mulai dari Sepatu Olahraga/Casual, Pakaian, Aksesori Fashion, hingga Produk Kebutuhan Harian.</p>
        </div>
    </div>

    <!-- Seksi Lokasi & Kontak: satu kartu berbentuk daftar -->
    <div class="section-title">
        <i class="fa-solid fa-location-dot"></i>
        <span>Lokasi & Kontak</span>
    </div>

    <div class="contact-grid">
        <div class="card-custom contact-card">
            <div class="info-icon"><i class="fa-solid fa-map-marked-alt"></i></div>
            <h4>Alamat Toko</h4>
            <p>Jl. Bebedahan Kp Silih Asih No. 123, Belakang Nany Salon</p>
        </div>
        <div class="card-custom contact-card">
            <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
            <h4>Jam Operasional</h4>
            <p>Senin - Minggu: 08.00 - 21.00 WIB</p>
        </div>
        <div class="card-custom contact-card">
            <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
            <h4>Telepon / WhatsApp</h4>
            <p>+62 812-3456-7890</p>
        </div>
        <div class="card-custom contact-card">
            <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
            <h4>Email Resmi</h4>
            <p>info@tokoginda.com / support@tokoginda.com</p>
        </div>
    </div>

</div>
@endsection