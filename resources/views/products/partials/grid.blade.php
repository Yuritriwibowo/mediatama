@if($books->count())
    @foreach ($books as $book)
        @php
            $img = $book->image
                ? asset(ltrim($book->image,'/'))
                : asset('images/no-image.jpg');
        @endphp

        <div class="col-md-3 mb-4 d-flex">
            <a href="{{ route('produk.show', $book->id) }}"
               class="text-decoration-none text-dark w-100">

                <div class="product-card w-100">

                    {{-- IMAGE --}}
                    <img src="{{ $img }}" alt="{{ $book->title }}">

                    {{-- CONTENT --}}
                    <div class="content">

                        <div class="product-category">
                            {{ $book->category }}
                        </div>

                        <div class="book-title">
                            {{ $book->title }}
                        </div>

                        <div class="price">
                            Rp{{ number_format($book->price,0,',','.') }}
                        </div>

                    </div>

                </div>
            </a>
        </div>
    @endforeach
@else
    <div class="col-12 text-center py-5 text-muted">
        Tidak ada produk pada kategori ini
    </div>
@endif
