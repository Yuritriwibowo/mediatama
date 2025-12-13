@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4 fw-bold">Tambah Produk Baru</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- === JUDUL === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Buku</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                {{-- === KATEGORI === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="category" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="E-PLUS">E-PLUS</option>
                        <option value="NON-TEKS">NON-TEKS</option>
                        <option value="ESENSI">ESENSI</option>
                    </select>
                </div>

                {{-- === HARGA === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control">
                </div>

                {{-- === LINK PRELIM === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Link Prelim (Opsional)</label>
                    <input type="text" name="sample_link" class="form-control">
                </div>

                {{-- === DESKRIPSI === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>

                {{-- === GAMBAR === --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Produk</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Detail Buku</h5>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Halaman</label>
                        <input type="number" name="pages" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Kurikulum</label>
                        <input type="text" name="curriculum" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Jenjang / Grade</label>
                        <input type="text" name="grade" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <input type="text" name="class" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Golongan</label>
                        <input type="text" name="group" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">ISBN</label>
                        <input type="text" name="isbn" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Tanggal Terbit</label>
                        <input type="date" name="published_at" class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary px-4 mt-3">Simpan Produk</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary px-4 mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
