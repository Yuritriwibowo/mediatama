<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DpConfirmation;
use App\Models\Product;



class ProductController extends Controller
{
    // =========================================
    // LIST PRODUK
    // =========================================
    public function index(Request $request)
    {
        $categories = Product::select('category')->distinct()->pluck('category');
        $books = Product::paginate(12);

        return view('products.index', [
            'books' => $books,
            'categories' => $categories
        ]);
    }

    // =========================================
    // DETAIL PRODUK
    // =========================================
    public function show($id)
    {
        $book = Product::findOrFail($id);

        $related = Product::where('category', $book->category)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        return view('products.show', compact('book', 'related'));
    }

    // =========================================
    // AJAX SEARCH
    // =========================================
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->keyword;

        $books = Product::where('title', 'LIKE', "%$keyword%")
            ->orWhere('category', 'LIKE', "%$keyword%")
            ->get();

        return view('products.partials.grid', compact('books'))->render();
    }

    // =========================================
    // AJAX FILTER CATEGORY
    // =========================================
    public function ajaxFilterCategory(Request $request)
{
    $category = $request->category;

    if ($category === '' || $category === null) {
        $books = Product::latest()->get(); // SEMUA
    } else {
        $books = Product::where('category', $category)->latest()->get();
    }

    return view('products.partials.grid', compact('books'))->render();
}


    // =========================================
    // ADD TO CART + NOTIFIKASI POPUP
    // =========================================
    public function addToCart($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    } else {
        $cart[$id] = [
            'title'    => $product->title,
            'category' => $product->category,
            'image'    => $product->image,
            'price'    => $product->price,
            'qty'      => 1
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('added', $product->title);
}


    // =========================================
    // CART PAGE
    // =========================================
    public function cartPage()
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $id => $item) {
            if (!isset($cart[$id]['qty'])) {
                $cart[$id]['qty'] = 1;
            }
        }

        session()->put('cart', $cart);

        return view('cart.index', compact('cart'));
    }

    // =========================================
    // INCREASE QTY
    // =========================================
    public function increaseQty($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        }

        session()->put('cart', $cart);
        return back();
    }

    // =========================================
    // DECREASE QTY
    // =========================================
    public function decreaseQty($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && $cart[$id]['qty'] > 1) {
            $cart[$id]['qty'] -= 1;
        }

        session()->put('cart', $cart);
        return back();
    }

    // =========================================
    // REMOVE ITEM
    // =========================================
    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Item dihapus dari keranjang');
    }

    // =========================================
    // CHECKOUT VIA WHATSAPP
    // =========================================
        public function checkoutWa()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang masih kosong!');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // DP 50%
        $dp = $total * 0.5;

        // SIMPAN KE DATABASE (DP PENDING)
        DpConfirmation::create([
            'customer_name' => 'Via WhatsApp',
            'total_amount'  => $total,
            'dp_amount'     => $dp,
            'status'        => 'pending'
        ]);

        // PESAN WA
        $msg = "Halo, saya ingin memesan buku berikut:%0A%0A";

        foreach ($cart as $item) {
            $msg .= "- {$item['title']} ({$item['category']}), Qty: {$item['qty']}%0A";
        }

        $msg .= "%0ATotal: Rp " . number_format($total, 0, ',', '.');
        $msg .= "%0ADP (50%): Rp " . number_format($dp, 0, ',', '.');
        $msg .= "%0A%0ASaya akan melakukan pembayaran DP.";

        $wa = "628159777660";

        return redirect("https://wa.me/$wa?text=$msg");
    }


    // =========================================
    // ADMIN LIST PRODUK
    // =========================================
    public function adminIndex()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // =========================================
    // FORM TAMBAH PRODUK
    // =========================================
    public function create()
    {
        return view('admin.products.create');
    }

    // =========================================
    // SIMPAN PRODUK
    // =========================================
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required',
        'category'    => 'required',
        'price'       => 'required|numeric',
        'description' => 'nullable',
        'sample_link' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'pages'       => 'nullable|numeric',
        'curriculum'  => 'nullable|string',
        'grade'       => 'nullable|string',
        'class'       => 'nullable|string',
        'group'       => 'nullable|string',
        'isbn'        => 'nullable|string',
        'published_at'=> 'nullable|date'
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $filename = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $filename);
        $imagePath = '/images/' . $filename;
    }

    Product::create([
        'title'        => $request->title,
        'category'     => $request->category,
        'price'        => $request->price,
        'description'  => $request->description,
        'sample_link'  => $request->sample_link,
        'image'        => $imagePath,
        'pages'        => $request->pages,
        'curriculum'   => $request->curriculum,
        'grade'        => $request->grade,
        'class'        => $request->class,
        'group'        => $request->group,
        'isbn'         => $request->isbn,
        'published_at' => $request->published_at,
    ]);

    return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan!');
}

    // =========================================
    // 🔥 FIX: METHOD EDIT() ADA DI SINI
    // =========================================
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // =========================================
    // UPDATE PRODUK
    // =========================================
    public function update(Request $request, $id)
{
    $request->validate([
        'title'       => 'required',
        'category'    => 'required',
        'price'       => 'required|numeric',
        'description' => 'nullable',
        'sample_link' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'pages'       => 'nullable|numeric',
        'curriculum'  => 'nullable|string',
        'grade'       => 'nullable|string',
        'class'       => 'nullable|string',
        'group'       => 'nullable|string',
        'isbn'        => 'nullable|string',
        'published_at'=> 'nullable|date'
    ]);

    $product = Product::findOrFail($id);

    $imagePath = $product->image;

    if ($request->hasFile('image')) {
        $filename = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $filename);
        $imagePath = '/images/' . $filename;
    }

    $product->update([
        'title'        => $request->title,
        'category'     => $request->category,
        'price'        => $request->price,
        'description'  => $request->description,
        'sample_link'  => $request->sample_link,
        'image'        => $imagePath,
        'pages'        => $request->pages,
        'curriculum'   => $request->curriculum,
        'grade'        => $request->grade,
        'class'        => $request->class,
        'group'        => $request->group,
        'isbn'         => $request->isbn,
        'published_at' => $request->published_at,
    ]);

    return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui!');
}

    // =========================================
    // DELETE PRODUK
    // =========================================
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('admin.products')->with('success', 'Produk dihapus!');
    }
}
