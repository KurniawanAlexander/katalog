@extends('layouts.app')

@section('content')
    <section class="py-1 px-4">
        <h2 class="text-center text-2xl font-bold mb-8">CATEGORY MENU</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-7xl mx-auto">

            <!-- Card -->
            <div class="card-category">
                <img src="{{ asset('assets/images/capuccino.jpg') }}" alt="Minuman" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h3 class="card-title">Minuman</h3>
                    <p class="card-description">Dari minuman tradisional...</p>
                </div>
            </div>

            <div class="card-category">
                <img src="{{ asset('assets/images/nasigoreng.jpg') }}" alt="Makanan" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h3 class="card-title">Makanan</h3>
                    <p class="card-description">Berbagai macam hidangan...</p>
                </div>
            </div>

            <div class="card-category">
                <img src="{{ asset('assets/images/kentanggoreng.jpg') }}" alt="Cemilan" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h3 class="card-title">Cemilan</h3>
                    <p class="card-description">Teman akrab buat ngopi...</p>
                </div>
            </div>

            <div class="card-category">
                <img src="{{ asset('assets/images/brownies.jpg') }}" alt="Dessert" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h3 class="card-title">Dessert</h3>
                    <p class="card-description">Sajian manis yang...</p>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4">
        <div class="w-full mt-6 p-6 bg-gray-50 border border-gray-300 rounded-2xl shadow-sm">
            {{-- Menggunakan nama route yang benar: 'frontend.index' --}}
            <form id="filter-form" method="GET" action="{{ route('frontend.index') }}">
                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Cari Menu</h3>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" name="search" placeholder="Search products..." value="{{ $request->search }}"
                            id="search-input"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-1.5 pl-9 pr-3">
                    </div>
                </div>

                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <label class="block text-sm font-bold text-gray-800 mb-3 uppercase tracking-wide">Status Produk</label>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="status-all" name="status" type="radio" value="all"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ $request->status === 'all' || !$request->has('status') ? 'checked' : '' }}>
                            <label for="status-all" class="ml-2 text-gray-700">Semua</label>
                        </div>
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="status-new" name="status" type="radio" value="new"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ $request->status === 'new' ? 'checked' : '' }}>
                            <label for="status-new" class="ml-2 text-gray-700">Baru</label>
                        </div>
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="status-old" name="status" type="radio" value="old"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ $request->status === 'old' ? 'checked' : '' }}>
                            <label for="status-old" class="ml-2 text-gray-700">Lama</label>
                        </div>
                    </div>
                </div>

                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <label class="block text-sm font-bold text-gray-800 mb-3 uppercase tracking-wide">Ketersediaan
                        Menu</label>
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="stock-all" name="product-stock" type="radio" value="all"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ ($request->has('product-stock') && $request->input('product-stock') === 'all') || !$request->has('product-stock') ? 'checked' : '' }}>
                            <label for="stock-all" class="ml-2 text-gray-700">Semua Menu</label>
                        </div>
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="stock-available" name="product-stock" type="radio" value="available"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ $request->input('product-stock') === 'available' ? 'checked' : '' }}>
                            <label for="stock-available" class="ml-2 text-gray-700">Tersedia</label>
                        </div>
                        <div class="flex items-center px-4 py-2 rounded-full border border-gray-300 shadow-sm text-sm">
                            <input id="stock-unavailable" name="product-stock" type="radio" value="unavailable"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600"
                                {{ $request->input('product-stock') === 'unavailable' ? 'checked' : '' }}>
                            <label for="stock-unavailable" class="ml-2 text-gray-700">Habis</label>
                        </div>
                    </div>
                </div>

                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <label for="price-range"
                        class="block text-sm font-bold text-gray-800 mb-3 uppercase tracking-wide">Saring
                        Harga</label>
                    <input type="range" name="max_price" id="price-range" min="0" max="100000"
                        value="{{ $request->max_price ?? 100000 }}"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    <div class="flex justify-between text-sm text-gray-500 mt-1">
                        <span>Rp0</span>
                        <span id="price-value">Rp{{ number_format($request->max_price ?? 100000, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <label class="block text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">Rentang Harga</label>
                    <div class="flex items-center space-x-2">
                        <div class="relative w-1/2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-xs">Rp</span>
                            <input type="text" id="min-price-input" name="min_price" placeholder="Min"
                                value="{{ $request->min_price }}"
                                class="w-full rounded-md border-gray-300 shadow-sm text-xs py-2 pl-8 pr-3 focus:ring-blue-500 focus:border-blue-500"
                                step="1000" min="0">
                        </div>
                        <span class="text-gray-500">-</span>
                        <div class="relative w-1/2">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-xs">Rp</span>
                            <input type="text" id="max-price-input" name="max_price_manual" placeholder="Max"
                                value="{{ $request->max_price_manual }}"
                                class="w-full rounded-md border-gray-300 shadow-sm text-xs py-2 pl-8 pr-3 focus:ring-blue-500 focus:border-blue-500"
                                step="1000" min="0">
                        </div>
                    </div>
                    <button type="submit"
                        class="mt-3 w-full bg-[#994d51] hover:bg-[#7a3c3f] text-white text-sm font-medium py-2 px-4 rounded-md shadow transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Terapkan
                    </button>
                </div>

                <div class="mb-5 pb-5 border-b-2 border-gray-300">
                    <h3 class="text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">Pilih Rentang Harga</h3>
                    <select id="price-range-dropdown" name="price_range_dropdown"
                        class="w-full py-2 px-3 border border-gray-300 rounded-lg text-sm focus:ring-[#994d51] focus:border-[#994d51] transition">
                        <option value="all">Semua harga</option>
                        <option value="0-10000" {{ $request->price_range_dropdown === '0-10000' ? 'selected' : '' }}>Di
                            bawah Rp 10.000</option>
                        <option value="10000-25000"
                            {{ $request->price_range_dropdown === '10000-25000' ? 'selected' : '' }}>Rp 10.000 - Rp 25.000
                        </option>
                        <option value="25000-50000"
                            {{ $request->price_range_dropdown === '25000-50000' ? 'selected' : '' }}>Rp 25.000 - Rp 50.000
                        </option>
                        <option value="50000-75000"
                            {{ $request->price_range_dropdown === '50000-75000' ? 'selected' : '' }}>Rp 50.000 - Rp 75.000
                        </option>
                        <option value="75000-100000"
                            {{ $request->price_range_dropdown === '75000-100000' ? 'selected' : '' }}>Rp 75.000 - Rp
                            100.000</option>
                    </select>
                </div>

                <button type="button" id="reset-filters"
                    class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors">
                    Reset Filters
                </button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.getElementById('filter-form');
                const searchInput = document.getElementById('search-input');
                const statusRadios = document.querySelectorAll('input[name="status"]');
                const stockRadios = document.querySelectorAll('input[name="product-stock"]');
                const priceRange = document.getElementById('price-range');
                const priceValue = document.getElementById('price-value');
                const minPriceInput = document.getElementById('min-price-input');
                const maxPriceInput = document.getElementById('max-price-input');
                const priceDropdown = document.getElementById('price-range-dropdown');
                const resetBtn = document.getElementById('reset-filters');

                // Fungsi untuk submit form
                const submitForm = () => {
                    form.submit();
                };

                // Event listener untuk input yang langsung memicu submit
                searchInput.addEventListener('input', () => submitForm());
                statusRadios.forEach(radio => radio.addEventListener('change', () => submitForm()));
                stockRadios.forEach(radio => radio.addEventListener('change', () => submitForm()));
                priceRange.addEventListener('change', () => submitForm());
                priceDropdown.addEventListener('change', () => submitForm());

                // Memperbarui nilai display range slider saat digeser
                priceRange.addEventListener('input', function() {
                    priceValue.textContent = 'Rp' + new Intl.NumberFormat('id-ID').format(this.value);
                    // Mengosongkan input harga manual saat slider digeser
                    minPriceInput.value = '';
                    maxPriceInput.value = '';
                });

                // Event listener untuk tombol reset
                resetBtn.addEventListener('click', function() {
                    // Mengosongkan semua field filter
                    searchInput.value = '';
                    minPriceInput.value = '';
                    maxPriceInput.value = '';
                    priceRange.value = priceRange.max;
                    priceValue.textContent = 'Rp' + new Intl.NumberFormat('id-ID').format(priceRange.max);

                    // Memilih radio button "Semua" secara default
                    document.getElementById('status-all').checked = true;
                    document.getElementById('stock-all').checked = true;

                    // Mengatur dropdown kembali ke "Semua harga"
                    priceDropdown.value = 'all';

                    // Submit form untuk reset
                    submitForm();
                });
            });
        </script>

        <div class="w-full mt-6">
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                <div class="w-full">
                    <div class="flex items-center gap-4">
                        <div class="relative w-1/2 bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                            <form action="/menu" method="GET">
                                <input type="hidden" name="search" value="{{ $request->search }}">
                                <input type="hidden" name="status" value="{{ $request->status }}">
                                <input type="hidden" name="max_price" value="{{ $request->max_price }}">
                                <select name="category" onchange="this.form.submit()"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <option value="all" {{ $request->category === 'all' ? 'selected' : '' }}>Semua Menu
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ $request->category === $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="relative w-1/2 bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                            <form action="/menu" method="GET">
                                <input type="hidden" name="search" value="{{ $request->search }}">
                                <input type="hidden" name="status" value="{{ $request->status }}">
                                <input type="hidden" name="max_price" value="{{ $request->max_price }}">
                                <input type="hidden" name="category" value="{{ $request->category }}">
                                <select name="sort_by" onchange="this.form.submit()"
                                    class="block w-full rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <option value="newest" {{ $request->sort_by === 'newest' ? 'selected' : '' }}>Urutkan
                                        menurut yang terbaru</option>
                                    <option value="cheapest" {{ $request->sort_by === 'cheapest' ? 'selected' : '' }}>
                                        Urutkan
                                        dari termurah</option>
                                    <option value="mostexpensive"
                                        {{ $request->sort_by === 'mostexpensive' ? 'selected' : '' }}>Urutkan dari termahal
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4 md:mt-0">
                    <div class="flex border border-gray-300 rounded-md shadow-sm divide-x divide-gray-300 ml-2">
                        <a href="{{ route('frontend.index', array_merge($request->except('view', 'page'), ['view' => 'grid'])) }}"
                            class="p-2 {{ $currentView === 'grid' ? 'bg-gray-200' : 'bg-white' }} text-gray-800 hover:bg-gray-300 rounded-l-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M4 4H10V10H4V4ZM14 4H20V10H14V4ZM4 14H10V20H4V14ZM14 14H20V20H14V14Z" />
                            </svg>
                        </a>
                        <a href="{{ route('frontend.index', array_merge($request->except('view', 'page'), ['view' => 'list'])) }}"
                            class="p-2 {{ $currentView === 'list' ? 'bg-gray-200' : 'bg-white' }} text-gray-800 hover:bg-gray-50 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full mt-6">
                <div class="w-full mt-6">
                    <main class="w-full">
                        <div id="menu-list"
                            class="{{ $currentView === 'list' ? 'space-y-6' : 'grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4' }} mt-6 lg:mt-0">
                            @forelse ($menus as $menu)
                                @if ($currentView === 'list')
                                    <div
                                        class="flex justify-between items-start border-b border-gray-200 pb-6 relative transform transition-transform duration-300 hover:scale-[1.01] hover:shadow-lg">
                                        <div class="flex-grow space-y-2">
                                            <h3 class="font-semibold text-lg">{{ $menu->name }}</h3>
                                            <p class="text-sm text-gray-600">{{ $menu->description ?? '' }}</p>
                                            <p class="text-base font-bold text-[#994d51]">
                                                Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                                            <button onclick="showMenuDetail({{ $menu->id }})"
                                                class="mt-2 px-4 py-2 bg-[#994d51] text-white font-semibold text-sm rounded-full hover:bg-[#864448] transition-colors duration-200">
                                                Detail
                                            </button>
                                        </div>
                                        <div class="relative w-32 h-32 ml-6">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                                class="w-full h-full rounded-lg object-cover" />
                                            @if ($menu->is_new)
                                                <span
                                                    class="bg-red-500 text-white text-sm font-semibold px-2 py-1 rounded-full absolute top-2 left-2">Baru</span>
                                            @endif
                                            @if (!$menu->is_available)
                                                <span
                                                    class="bg-gray-500 text-white text-sm font-semibold px-2 py-1 rounded-full absolute top-2 right-2">Habis</span>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col items-center border border-gray-200 rounded-lg p-4 text-center relative transform transition-transform duration-300 hover:scale-[1.05] hover:shadow-lg">
                                        <div class="relative w-24 h-24 mb-2">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                                class="w-full h-full rounded-lg object-cover" />
                                            @if ($menu->is_new)
                                                <span
                                                    class="bg-red-500 text-white text-sm font-semibold px-2 py-1 rounded-full absolute top-2 left-2">Baru</span>
                                            @endif
                                        </div>
                                        <h3 class="font-semibold text-sm">{{ $menu->name }}</h3>
                                        <p class="text-sm font-bold text-[#994d51]">
                                            Rp{{ number_format($menu->price, 0, ',', '.') }}</p>

                                        <button onclick="showMenuDetail({{ $menu->id }})"
                                            class="mt-2 px-4 py-2 bg-[#994d51] text-white font-semibold text-sm rounded-full hover:bg-[#864448] transition-colors duration-200">
                                            Detail
                                        </button>

                                    </div>
                                @endif
                            @empty
                                <p class="text-center text-gray-500">Tidak ada produk yang cocok dengan filter.</p>
                            @endforelse
                        </div>
                    </main>
                </div>

                <div class="mt-3">
                    {{ $menus->links('pagination::tailwind') }}
                </div>
            </div>

            <div id="modal-container" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black bg-opacity-50">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl p-6 relative">
                        <button onclick="hideModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div id="modal-body">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const modalContainer = document.getElementById('modal-container');
                const modalBody = document.getElementById('modal-body');
                const apiUrl = "{{ url('/api/menu') }}";
                const storageUrl = "{{ asset('storage') }}";

                function showModal() {
                    modalContainer.classList.remove('hidden');
                }

                function hideModal() {
                    modalContainer.classList.add('hidden');
                    modalBody.innerHTML = '';
                }

                async function showMenuDetail(menuId) {
                    try {
                        const response = await fetch(`/menu/${menuId}/detail`);
                        const menu = await response.json();

                        // Bangun konten modal sesuai dengan desain yang Anda berikan
                        const content = `
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <div class="w-full md:w-1/2">
                       <img src="${storageUrl}/${menu.image}" alt="${menu.name}" class="w-full h-auto rounded-lg object-cover" />
                    </div>
                    <div class="flex-grow text-center md:text-left">
                        <h2 class="text-2xl font-bold mb-2">${menu.name}</h2>
                        <p class="text-gray-600 mb-4">${menu.description || ''}</p>
                        <p class="text-2xl font-bold text-[#994d51] mb-6">
                            Rp${new Intl.NumberFormat('id-ID').format(menu.price)}
                            <span class="text-base font-normal text-gray-500">/cup</span>
                        </p>
                        <div class="space-x-2">
                           ${menu.is_new ? '<span class="bg-red-500 text-white text-sm font-semibold px-2 py-1 rounded-full">Baru</span>' : ''}
                           ${!menu.is_available ? '<span class="bg-gray-500 text-white text-sm font-semibold px-2 py-1 rounded-full">Habis</span>' : ''}
                        </div>
                        <button class="mt-8 w-full md:w-auto px-6 py-3 bg-[#994d51] text-white font-semibold rounded-full hover:bg-[#864448] transition-colors duration-200">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            `;

                        modalBody.innerHTML = content;
                        showModal();

                    } catch (error) {
                        console.error('Error fetching menu detail:', error);
                        modalBody.innerHTML = '<p class="text-red-500">Gagal memuat detail menu. Silakan coba lagi.</p>';
                        showModal();
                    }
                }
            </script>
        </div>
    </div>
@endsection
