<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenus = Menu::count();
        $totalCategories = Category::count();
        $availableMenus = Menu::where('is_available', true)->count();
        $unavailableMenus = Menu::where('is_available', false)->count();
        $latestMenus = Menu::latest()->take(5)->get();

        // Ambil semua kategori beserta jumlah menunya
        $categoriesWithMenuCount = Category::withCount('menus')->get();

        // Data yang dikirim ke view
        return view('admin.dashboard', [
            'totalMenus' => $totalMenus,
            'totalCategories' => $totalCategories,
            'availableMenus' => $availableMenus,
            'unavailableMenus' => $unavailableMenus,
            'latestMenus' => $latestMenus,
            // Variabel ini sekarang berisi koleksi objek kategori
            'categories' => $categoriesWithMenuCount,
        ]);
    }
}
