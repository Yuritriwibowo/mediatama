@foreach ($books as $book)

    @php $img = ltrim($book->image, '/'); @endphp

    <div class="col-md-3 mb-4">
        <a href="{{ route('produk.show', $book->id) }}" style="text-decoration:none; color:inherit;">
            <div class="card shadow-sm book-card">
                <img src="{{ asset($img) }}" class="card-img-top">
                <div class="card-body">
                    <div class="category">{{ $book->category }}</div>
                    <h6 class="card-title">{{ $book->title }}</h6>
                </div>
            </div>
        </a>
    </div>

@endforeach

@if ($books->count() == 0)
    <div class="text-center text-muted py-4">Tidak ada produk ditemukan.</div>
@endif
