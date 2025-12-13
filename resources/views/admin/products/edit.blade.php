@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4 fw-bold">Edit Produk</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            {{-- =============================
                 FORM UPDATE (POST ONLY)
            ============================== --}}
            <form action="{{ route('admin.products.update', $product->id) }}"
                  method="POST" enctype="multipart/form-data">

                @csrf {{-- JANGAN pakai PUT, route hanya terima POST --}}

                {{-- ===========================
                     JUDUL
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Buku</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ $product->title }}" required>
                </div>

                {{-- ===========================
                     KATEGORI
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="category" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="E-PLUS" {{ $product->category=='E-PLUS' ? 'selected':'' }}>E-PLUS</option>
                        <option value="NON-TEKS" {{ $product->category=='NON-TEKS' ? 'selected':'' }}>NON-TEKS</option>
                        <option value="ESENSI" {{ $product->category=='ESENSI' ? 'selected':'' }}>ESENSI</option>
                    </select>
                </div>

                {{-- ===========================
                     HARGA
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control"
                           value="{{ $product->price }}">
                </div>

                {{-- ===========================
                     LINK PRELIM
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Link Prelim</label>
                    <input type="text" name="sample_link" class="form-control"
                           value="{{ $product->sample_link }}">
                </div>

                {{-- ===========================
                     DESKRIPSI
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
                </div>

                {{-- ===========================
                     GAMBAR PRODUK
                ============================ --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar Produk</label>

                    <div class="mb-2">
                        @if($product->image)
                            <img src="{{ asset(ltrim($product->image, '/')) }}"
                                 width="120" class="rounded shadow-sm">
                        @else
                            <p class="text-muted">Belum ada gambar</p>
                        @endif
                    </div>

                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Biarkan kosong jika tidak mengganti gambar</small>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Detail Buku</h5>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Halaman</label>
                        <input type="number" name="pages" class="form-control"
                               value="{{ $product->pages }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Kurikulum</label>
                        <input type="text" name="curriculum" class="form-control"
                               value="{{ $product->curriculum }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Jenjang / Grade</label>
                        <input type="text" name="grade" class="form-control"
                               value="{{ $product->grade }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Kelas</label>
                        <input type="text" name="class" class="form-control"
                               value="{{ $product->class }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Golongan</label>
                        <input type="text" name="group" class="form-control"
                               value="{{ $product->group }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">ISBN</label>
                        <input type="text" name="isbn" class="form-control"
                               value="{{ $product->isbn }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Tanggal Terbit</label>
                        <input type="date" name="published_at" class="form-control"
                               value="{{ $product->published_at }}">
                    </div>

                </div>

                {{-- ===========================
                     BUTTON
                ============================ --}}
                <button class="btn btn-primary px-4 mt-3">
                    Simpan Perubahan
                </button>

                <a href="{{ url()->previous() }}"
                   class="btn btn-secondary px-4 mt-3">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection
