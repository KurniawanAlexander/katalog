<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        // 1. Inisialisasi query
        $query = Menu::query(); // Memulai query builder untuk model Menu

        // 2. Menerapkan filter
        if ($request->filled('search')) { // Cek apakah ada input 'search'
            $query->where('name', 'like', '%' . $request->search . '%'); // Filter menu berdasarkan nama
        }

        if ($request->filled('category') && $request->category !== 'all') { // Cek apakah ada input 'category' dan bukan 'all'
            $query->whereHas('category', function ($q) use ($request) { // Filter menu berdasarkan nama kategori
                $q->where('name', $request->category);
            });
        }

        if ($request->filled('status')) { // Cek apakah ada input 'status'
            if ($request->status === 'new') { // Jika status 'new'
                $query->where('is_new', true); // Filter menu yang baru
            } elseif ($request->status === 'old') { // Jika status 'old'
                $query->where('is_new', false); // Filter menu yang lama
            }
        }

        if ($request->filled('product-stock')) { // Cek apakah ada input 'product-stock'
            if ($request->input('product-stock') === 'available') { // Jika status stok 'available'
                $query->where('is_available', true); // Filter menu yang tersedia
            } elseif ($request->input('product-stock') === 'unavailable') { // Jika status stok 'unavailable'
                $query->where('is_available', false); // Filter menu yang habis
            }
        }

        if ($request->filled('min_price') && $request->filled('max_price_manual')) {
            // Logika untuk input manual
            $minPrice = (int) str_replace(['Rp ', '.', ','], '', $request->input('min_price', 0));
            $maxPrice = (int) str_replace(['Rp ', '.', ','], '', $request->input('max_price_manual', 99999999));
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        } elseif ($request->filled('price_range_dropdown') && $request->input('price_range_dropdown') !== 'all') {
            // Logika untuk dropdown
            list($min, $max) = explode('-', $request->input('price_range_dropdown'));
            $query->whereBetween('price', [(int)$min, (int)$max]);
        } elseif ($request->filled('max_price')) {
            // Logika untuk slider harga
            $maxPrice = (int) $request->input('max_price');
            $query->where('price', '<=', $maxPrice);
        }

        // 3. Menerapkan pengurutan
        if ($request->filled('sort_by')) { // Cek apakah ada input 'sort_by'
            if ($request->sort_by === 'cheapest') { // Jika urutan 'cheapest'
                $query->orderBy('price', 'asc'); // Urutkan berdasarkan harga termurah
            } elseif ($request->sort_by === 'mostexpensive') { // Jika urutan 'mostexpensive'
                $query->orderBy('price', 'desc'); // Urutkan berdasarkan harga termahal
            } elseif ($request->sort_by === 'newest') { // Jika urutan 'newest'
                $query->orderBy('created_at', 'desc'); // Urutkan berdasarkan tanggal terbaru
            }
        } else {
            // Perubahan di sini: Mengubah 'desc' menjadi 'asc'
            $query->orderBy('created_at', 'asc'); // Urutan default berdasarkan tanggal terlama
        }

        // 4. Mengambil data
        $menus = $query->paginate(10); // Ambil 10 menu per halaman
        $menus->appends($request->all()); // Tambahkan parameter query ke URL pagination

        // 5. Menentukan tampilan
        $currentView = $request->input('view', 'list'); // Tentukan tampilan saat ini (list atau grid)

        // 6. Mengambil kategori
        $categories = Category::all(); // Ambil semua data kategori

        // 7. Mengirim data ke view
        return view('frontend.menu.index', [ // Tampilkan view dengan data yang sudah disiapkan
            'menus' => $menus,
            'categories' => $categories,
            'currentView' => $currentView,
            'request' => $request,
        ]);
    }

    public function detail($id)
    {
        $menu = \App\Models\Menu::find($id);
        if (!$menu) {
            return response()->json(['message' => 'Menu tidak ditemukan'], 404);
        }
        return response()->json($menu);
    }

    public function showMenuApi(Menu $menu)
    {
        return response()->json($menu);
    }
}
