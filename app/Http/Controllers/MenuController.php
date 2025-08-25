<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')
            ->orderBy('created_at', 'asc')
            ->paginate(10); // 10 data per halaman
        return view('admin.menus.index', compact('menus'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric',
            'is_new'       => 'required|boolean',
            'is_available' => 'required|boolean',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $data = $request->only(['category_id', 'name', 'description', 'price', 'is_new', 'is_available']);

        $data['price'] = preg_replace('/\D/', '', $request->price);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        Menu::create($data);
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        // Ubah format harga jadi angka murni sebelum validasi
        $request->merge([
            'price' => preg_replace('/\D/', '', $request->price)
        ]);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['category_id', 'name', 'description', 'price', 'is_new', 'is_available']);

        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        $menu->update($data);

        // Dapatkan nomor halaman dari permintaan, default ke 1 jika tidak ada
        $page = $request->input('page', 1);

        // Redirect kembali ke halaman index dengan nomor halaman yang disimpan
        return redirect()->route('menus.index', ['page' => $page])
            ->with('success', 'Menu berhasil diperbarui');
    }


    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    }
}
