<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan untuk mengimpor DB Facade

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenus = Menu::count();
        $totalCategories = Category::count();
        $availableMenus = Menu::where('is_available', true)->count();
        $unavailableMenus = Menu::where('is_available', false)->count();
        $latestMenus = Menu::latest()->take(5)->get();

        $categoriesWithMenuCount = Category::withCount('menus')->get();

        // **Tambahkan kode ini untuk Area Chart**
        $menuCountsPerMonth = Menu::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as total')
        )
            ->whereYear('created_at', now()->year) // Opsional: Filter hanya untuk tahun ini
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->all();

        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 10)); // Menggunakan nama bulan penuh
            $data[] = $menuCountsPerMonth[$i] ?? 0;
        }

        return view('admin.dashboard', [
            'totalMenus' => $totalMenus,
            'totalCategories' => $totalCategories,
            'availableMenus' => $availableMenus,
            'unavailableMenus' => $unavailableMenus,
            'latestMenus' => $latestMenus,
            'categories' => $categoriesWithMenuCount,
            'chartAreaLabels' => $labels, // Kirim variabel ini ke view
            'chartAreaData' => $data,   // Kirim variabel ini ke view
        ]);
    }
}
