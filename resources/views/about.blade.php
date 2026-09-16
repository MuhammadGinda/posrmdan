<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'About')

<!-- batas awal isi konten -->
@section('content')

@include('layouts.navbar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

    /* Kartu profil pengembang terpusat */
    .profile-hero {
        text-align: center;
        padding: 35px 20px 30px 20px;
        margin-bottom: 25px;
    }
    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #e0e7ff;
        margin: 0 auto 16px auto;
        display: block;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
    }
    .profile-hero h1 {
        color: #1e293b;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .profile-hero .profile-role {
        color: #4f46e5;
        font-size: 13.5px;
        font-weight: 600;
        margin: 0;
    }

    /* Kartu deskripsi project */
    .about-card {
        padding: 22px 24px;
        margin-bottom: 25px;
    }
    .about-card p {
        color: #64748b;
        font-size: 13.5px;
        line-height: 1.7;
        margin: 0;
    }

    /* Grid dua kolom: Detail Pengembang & Teknologi */
    .info-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }
    @media (max-width: 767px) {
        .info-row { grid-template-columns: 1fr; }
    }
    .info-card {
        padding: 22px;
    }
    .info-card h4 {
        color: #1e293b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .info-card h4 i {
        color: #4f46e5;
        background-color: #e0e7ff;
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
    }
    .info-card ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .info-card ul li {
        color: #64748b;
        font-size: 13px;
        line-height: 2;
    }
    .info-card ul li strong {
        color: #1e293b;
    }

    /* Kartu Tujuan Aplikasi */
    .goal-card {
        padding: 20px 24px;
        margin-bottom: 25px;
        background-color: #e0e7ff;
        border: none;
    }
    .goal-card h4 {
        color: #4f46e5;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .goal-card p {
        color: #4338ca;
        font-size: 13px;
        line-height: 1.6;
        margin: 0;
        opacity: 0.85;
    }

    /* Kontak & media sosial */
    .contact-card {
        padding: 25px;
        text-align: center;
    }
    .contact-card h4 {
        color: #1e293b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 16px;
    }
    .social-icons {
        display: flex;
        justify-content: center;
        gap: 14px;
    }
    .social-icons a {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background-color: #e0e7ff;
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }
    .social-icons a:hover {
        background-color: #4f46e5;
        color: #ffffff;
    }

    .footer-note {
        text-align: center;
        color: #94a3b8;
        font-size: 12px;
        margin-top: 10px;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

                <!-- Kartu profil pengembang -->
                <div class="card-custom profile-hero">
                    <img src="{{ asset('images/Profil.png') }}" alt="Muhammad Ginda Ramdani" class="profile-img">
                    <h1>Muhammad Ginda Ramdani</h1>
                    <p class="profile-role">Kelas 12 PPLG 2 &bull; SMKN 4 Tasikmalaya</p>
                </div>

                <!-- Tentang Pengembang & Project -->
                <div class="section-title">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Tentang Pengembang & Project</span>
                </div>
                <div class="card-custom about-card">
                    <p>
                        Aplikasi Point of Sale (POS) ini dikembangkan oleh <strong>Muhammad Ginda Ramdani</strong>,
                        siswa jurusan <strong>Pengembangan Perangkat Lunak dan Gim (PPLG)</strong> di SMKN 4 Tasikmalaya.
                        Project ini dirancang sebagai bentuk penerapan kompetensi keahlian dalam rekayasa perangkat lunak,
                        khususnya dalam membangun sistem kasir digital yang praktis, efisien, dan responsif untuk membantu
                        operasional bisnis dan UMKM.
                    </p>
                </div>

                <!-- Detail Pengembang & Teknologi -->
                <div class="info-row">
                    <div class="card-custom info-card">
                        <h4><i class="fa-solid fa-id-card"></i>Detail Pengembang</h4>
                        <ul>
                            <li><strong>Nama:</strong> Muhammad Ginda Ramdani</li>
                            <li><strong>Kelas:</strong> 12 PPLG 2</li>
                            <li><strong>Jurusan:</strong> PPLG</li>
                            <li><strong>Instansi:</strong> SMKN 4 Tasikmalaya</li>
                        </ul>
                    </div>
                    <div class="card-custom info-card">
                        <h4><i class="fa-solid fa-microchip"></i>Teknologi & Tools</h4>
                        <ul>
                            <li><strong>Framework:</strong> Laravel 12 & PHP 8.4</li>
                            <li><strong>UI:</strong> Bootstrap & Icons</li>
                            <li><strong>Server:</strong> Apache</li>
                            <li><strong>Database:</strong> MySQL</li>
                        </ul>
                    </div>
                </div>

                <!-- Tujuan Aplikasi -->
                <div class="card-custom goal-card">
                    <h4><i class="fa-solid fa-bullseye"></i>Tujuan Aplikasi</h4>
                    <p>Membantu pencatatan transaksi penjualan, pengelolaan stok barang, dan pembuatan laporan keuangan harian secara otomatis dan akurat.</p>
                </div>

                <!-- Kontak & Media Sosial -->
                <div class="card-custom contact-card">
                    <h4>Hubungi Pengembang</h4>
                    <div class="social-icons">
                        <a href="https://gmail.com/mhmmdramdann07@gmail.com" target="_blank"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://github.com/MuhammadGinda" target="_blank"><i class="fa-brands fa-github"></i></a>
                        <a href="https://instagram.com/yyaaa481" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

            <p class="footer-note">&copy; 2026 Muhammad Ginda Ramdani - PPLG SMKN 4 Tasikmalaya</p>

        </div>
    </div>
</div>

@endsection