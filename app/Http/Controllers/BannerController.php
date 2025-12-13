<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'nullable|string',
            'link'  => 'nullable|string',
        ]);

        // Upload gambar ke public/images/banner
        $filename = time() . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/banner'), $filename);

        Banner::create([
            'title' => $request->title,
            'link'  => $request->link,
            'image' => '/images/banner/' . $filename,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus!');
    }
}
