@extends('layouts.app')

@section('content')
<div class="container">

<style>
/* ===========================
   GLOBAL STYLE
=========================== */
.section-title {
    font-size: 32px;
    font-weight: 800;
    color: #b00020;
}

.section-sub {
    font-size: 18px;
    color: #777;
}

.hero-box {
    background: linear-gradient(135deg, #b00020, #e91e63);
    color: white;
    padding: 60px;
    border-radius: 18px;
    margin-bottom: 50px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.20);
}

.hero-title {
    font-size: 38px;
    font-weight: 900;
}

.about-card {
    background: white;
    padding: 28px;
    border-radius: 18px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transition: .25s;
}
.about-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.13);
}

.icon-circle {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    background: #b00020;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 28px;
    margin-bottom: 15px;
    box-shadow: 0 6px 12px rgba(176,0,32,0.3);
}

.timeline-item {
    padding-left: 30px;
    border-left: 4px solid #b00020;
    margin-bottom: 30px;
}

.timeline-item h5 {
    font-weight: 700;
    color: #b00020;
}

.team-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: .25s;
}
.team-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 26px rgba(0,0,0,0.15);
}

.team-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
    box-shadow: 0 6px 14px rgba(0,0,0,0.15);
}
</style>


{{-- =====================================
      HERO SECTION
===================================== --}}
<div class="hero-box text-center">
    <h1 class="hero-title">Profil Perusahaan Mediatama</h1>
    <p class="mt-3" style="font-size: 18px; opacity: .9;">
        Penerbit buku pendidikan berkualitas sejak 1998 — mendukung pembelajaran di seluruh Indonesia.
    </p>
</div>


{{-- =====================================
      TENTANG PERUSAHAAN
===================================== --}}
<div class="mb-5">
    <h2 class="section-title mb-3">Tentang Kami</h2>

    <div class="about-card">
        <p style="font-size: 17px; line-height: 1.7;">
            Mediatama adalah penerbit buku pendidikan yang berkomitmen menyediakan buku berkualitas tinggi 
            untuk siswa dan guru di berbagai jenjang pendidikan. Dengan pengalaman lebih dari **20 tahun**, 
            Mediatama telah menjadi pilihan utama ribuan sekolah di Indonesia.

            <br><br>
            Fokus utama kami adalah menghadirkan buku yang relevan, mudah dipahami,
            serta mendukung kurikulum terbaru agar proses belajar semakin efektif.
        </p>
    </div>
</div>



{{-- =====================================
      VISI & MISI
===================================== --}}
<div class="mb-5">
    <h2 class="section-title mb-3">Visi & Misi</h2>

    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="about-card text-center">
                <div class="icon-circle">🎯</div>
                <h5 class="fw-bold mb-2">Visi</h5>
                <p>
                    Menjadi penerbit pendidikan terbaik di Indonesia yang memberikan solusi belajar inovatif 
                    dan berkualitas tinggi bagi generasi masa depan.
                </p>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="about-card text-center">
                <div class="icon-circle">🚀</div>
                <h5 class="fw-bold mb-2">Misi</h5>
                <p>
                    • Menghadirkan buku yang relevan dengan kurikulum terbaru.<br>
                    • Membantu guru dan siswa melalui konten edukasi berkualitas.<br>
                    • Menciptakan inovasi digital dalam dunia pendidikan.<br>
                    • Mendukung pemerataan pendidikan di seluruh Indonesia.
                </p>
            </div>
        </div>

    </div>
</div>



{{-- =====================================
      SEJARAH PERUSAHAAN
===================================== --}}
<div class="mb-5">
    <h2 class="section-title mb-3">Sejarah Perusahaan</h2>

    <div class="timeline-item">
        <h5>1998 — Berdiri</h5>
        <p>Mediatama didirikan sebagai penerbit lokal dengan fokus pada buku ilmu pengetahuan alam.</p>
    </div>

    <div class="timeline-item">
        <h5>2008 — Ekspansi Nasional</h5>
        <p>Mediatama mulai mendistribusikan buku ke seluruh Indonesia dan bekerja sama dengan banyak sekolah.</p>
    </div>

    <div class="timeline-item">
        <h5>2018 — Integrasi Kurikulum Baru</h5>
        <p>Seluruh buku diperbarui menyesuaikan kurikulum 2013 dan kebutuhan pembelajaran modern.</p>
    </div>

    <div class="timeline-item">
        <h5>2023 — Transformasi Digital</h5>
        <p>Penerapan sistem digital seperti e-prelim, katalog online, dan marketplace resmi.</p>
    </div>
</div>




{{-- =====================================
      AJAKAN AKHIR
===================================== --}}
<div class="text-center my-5">
    <h3 class="fw-bold">Bersama Membangun Pendidikan Indonesia</h3>
    <p class="text-muted" style="font-size: 17px;">
        Mediatama terus berkomitmen menghadirkan inovasi demi pendidikan yang lebih baik.
    </p>

    <a href="/produk" class="btn btn-danger px-4 py-3 mt-2" style="border-radius: 12px; font-size: 17px;">
        Lihat Katalog Buku →
    </a>
</div>

</div>
@endsection
