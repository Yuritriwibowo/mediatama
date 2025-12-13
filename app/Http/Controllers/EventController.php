<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;

class EventController extends Controller
{
    // PUBLIC LIST
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    // PUBLIC DETAIL
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }

    // ADMIN LIST
    public function adminIndex()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.events.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'category'    => 'required',
            'description' => 'required',
            'start_date'  => 'required|date',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/events'), $filename);
            $imagePath = 'images/events/' . $filename;
        }

        Event::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'category'    => $request->category,
            'description' => $request->description,
            'start_date'  => $request->start_date,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    // EDIT FORM
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title'       => 'required',
            'category'    => 'required',
            'description' => 'required',
            'start_date'  => 'required|date',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $event->image;

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/events'), $filename);
            $imagePath = 'images/events/' . $filename;
        }

        $event->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'category'    => $request->category,
            'description' => $request->description,
            'start_date'  => $request->start_date,
            'image'       => $imagePath,
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}
