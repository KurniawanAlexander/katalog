@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6 text-center">KATALOG</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:flex lg:space-x-8 mt-6">

        <aside class="w-full lg:w-1/4 mt-6 lg:mt-0 p-4 border border-gray-200 rounded-lg shadow-sm mb-4 lg:mb-0">
            <div class="mb-4 pb-4 border-b border-gray-200">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xs font-bold text-gray-700 uppercase tracking-wide">Cari Produk</h3>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" id="search-product" placeholder="Search products..."
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-xs py-1.5 pl-9 pr-3">
                </div>
            </div>

            <div class="mb-4 pb-4 border-b border-gray-200">
                <label class="block text-xs font-bold text-gray-700 mb-1">Status Produk</label>
                <div class="flex flex-col space-y-1">
                    <div class="flex items-center">
                        <input id="status-all" name="product-status" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" checked>
                        <label for="status-all" class="ml-1 block text-xs text-gray-900">Semua</label>
                    </div>
                    <div class="flex items-center">
                        <input id="status-new" name="product-status" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <label for="status-new" class="ml-1 block text-xs text-gray-900">Baru</label>
                    </div>
                    <div class="flex items-center">
                        <input id="status-old" name="product-status" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                        <label for="status-old" class="ml-1 block text-xs text-gray-900">Lama</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="price-range" class="block text-xs font-bold text-gray-700 mb-1">Saring Harga</label>
                <input type="range" id="price-range" min="0" max="50000" value="50000"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>Rp0</span>
                    <span id="price-value">Rp50.000</span>
                </div>
            </div>
        </aside>

        <div class="w-full lg:w-3/4">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
                <div class="flex space-x-2 w-full md:w-auto mb-4 md:mb-0">
                    <div class="relative flex-1">
                        <button id="filter-category-btn" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span id="category-label" class="truncate">Semua Menu</span>
                            <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="category-options"
                            class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="filter-category-btn">
                                <a href="#"
                                    class="category-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-category="all">Semua Menu</a>
                                <a href="#"
                                    class="category-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-category="minuman">Minuman</a>
                                <a href="#"
                                    class="category-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-category="makanan">Makanan</a>
                                <a href="#"
                                    class="category-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-category="cemilan">Cemilan</a>
                                <a href="#"
                                    class="category-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-category="dessert">Dessert</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative flex-1">
                        <button id="sort-menu-btn" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-2 py-2 bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span id="sort-label" class="truncate">Urutkan menu</span>
                            <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="sort-options"
                            class="origin-top-right absolute right-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="sort-menu-btn">
                                <a href="#"
                                    class="sort-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-sort-by="newest">Urutkan menurut yang terbaru</a>
                                <a href="#"
                                    class="sort-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-sort-by="cheapest">Urutkan dari termurah</a>
                                <a href="#"
                                    class="sort-option text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100"
                                    data-sort-by="mostexpensive">Urutkan dari termahal</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4 md:mt-0">
                    <div class="flex border border-gray-300 rounded-md shadow-sm divide-x divide-gray-300 ml-2">
                        <button id="view-grid" class="p-2 bg-white text-gray-700 hover:bg-gray-50 rounded-l-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M4 4H10V10H4V4ZM14 4H20V10H14V4ZM4 14H10V20H4V14ZM14 14H20V20H14V14Z" />
                            </svg>
                        </button>
                        <button id="view-list" class="p-2 bg-white text-gray-700 hover:bg-gray-50 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <main class="w-full">
                <div id="menu-list" class="space-y-6 mt-6 lg:mt-0">
                </div>
                <div id="pagination-controls" class="flex justify-center items-center space-x-2 mt-6">
                </div>
            </main>
        </div>
    </div>

    <script>
        // Data menu dan variabel lainnya
        const menuData = [{
                id: 'kopisusugulaaren',
                category: 'minuman',
                name: 'Kopi Susu Aren',
                description: 'Perpaduan espresso, susu segar, dan manisnya gula aren alami.',
                price: 18000,
                image: 'images/kopisusugulaaren.jfif',
                isNew: true
            },
            {
                id: 'capuccino',
                category: 'minuman',
                name: 'Capuccino',
                description: 'Paduan sempurna antara espresso, susu hangat, dan busa susu lembut.',
                price: 20000,
                image: 'images/capuccino.jfif',
                isNew: false
            },
            {
                id: 'rotibakarcoklat',
                category: 'makanan',
                name: 'Roti Bakar Coklat',
                description: 'Roti panggang isi coklat meleleh dengan taburan meses.',
                price: 12000,
                image: 'images/rotibakarcoklat.jfif',
                isNew: false
            },
            {
                id: 'nasigorengkampung',
                category: 'makanan',
                name: 'Nasi Goreng Kampung',
                description: 'Nasi goreng pedas dengan irisan ayam, telur, dan kerupuk.',
                price: 25000,
                image: 'images/nasigoreng.jfif',
                isNew: true
            },
            {
                id: 'sandwich',
                category: 'makanan',
                name: 'Sandwich',
                description: 'Roti isi daging asap, sayuran segar, dan saus mayo.',
                price: 10000,
                image: 'images/sandwich.jfif',
                isNew: false
            },
            {
                id: 'salad',
                category: 'makanan',
                name: 'Salad Sayur',
                description: 'Campuran sayuran segar dengan dressing lemon.',
                price: 18000,
                image: 'images/salad.jfif',
                isNew: false
            },
            {
                id: 'pasta',
                category: 'makanan',
                name: 'Pasta Aglio e Olio',
                description: 'Pasta dengan saus bawang putih, minyak zaitun, dan cabai.',
                price: 20000,
                image: 'images/pasta.jfif',
                isNew: false
            },
            {
                id: 'croissant',
                category: 'makanan',
                name: 'Croissant',
                description: 'Roti croissant renyah dengan isian selai strawberry.',
                price: 15000,
                image: 'images/croissant.jfif',
                isNew: false
            },
            {
                id: 'kentanggoreng',
                category: 'cemilan',
                name: 'Kentang Goreng',
                description: 'Crunchy, gurih, dan pas sebagai teman minum kopi.',
                price: 15000,
                image: 'images/kentanggoreng.jfif',
                isNew: false
            },
            {
                id: 'pisangcrispy',
                category: 'cemilan',
                name: 'Pisang Crispy',
                description: 'Potongan pisang yang digoreng hingga renyah, dilapisi saus karamel dan keju.',
                price: 17000,
                image: 'images/pisangcrispy.jfif',
                isNew: true
            },
            {
                id: 'cheesecake',
                category: 'dessert',
                name: 'Cheesecake',
                description: 'Kue keju lembut dengan lapisan biskuit di bawahnya.',
                price: 30000,
                image: 'images/cheesecake.jfif',
                isNew: true
            },
            {
                id: 'moccacino',
                category: 'minuman',
                name: 'Moccacino',
                description: 'Espresso dengan cokelat, susu, dan whipped cream.',
                price: 22000,
                image: 'images/moccacino.jfif',
                isNew: false
            },
            {
                id: 'espresso',
                category: 'minuman',
                name: 'Espresso',
                description: 'Kopi hitam pekat dengan aroma yang kuat.',
                price: 17000,
                image: 'images/espresso.jfif',
                isNew: false
            },
            {
                id: 'latte',
                category: 'minuman',
                name: 'Latte',
                description: 'Espresso dengan susu panas dan sedikit busa.',
                price: 22000,
                image: 'images/latte.jfif',
                isNew: false
            },
            {
                id: 'americano',
                category: 'minuman',
                name: 'Americano',
                description: 'Espresso yang disajikan dengan air panas.',
                price: 16000,
                image: 'images/americano.jfif',
                isNew: false
            },
            {
                id: 'tehtarik',
                category: 'minuman',
                name: 'Teh Tarik',
                description: 'Teh susu klasik yang ditarik hingga berbusa.',
                price: 15000,
                image: 'images/tehtarik.jfif',
                isNew: false
            },
            {
                id: 'ayambakarmadu',
                category: 'makanan',
                name: 'Ayam Bakar Madu',
                description: 'Ayam panggang dengan bumbu madu manis dan gurih.',
                price: 35000,
                image: 'images/ayambakarmadu.jfif',
                isNew: false
            },
            {
                id: 'spaghetti',
                category: 'makanan',
                name: 'Spaghetti Bolognese',
                description: 'Spaghetti dengan saus daging cincang dan keju parmesan.',
                price: 32000,
                image: 'images/spaghetti.jfif',
                isNew: false
            },
            {
                id: 'tahugejrot',
                category: 'cemilan',
                name: 'Tahu Gejrot',
                description: 'Tahu goreng dengan kuah pedas manis khas Cirebon.',
                price: 10000,
                image: 'images/tahugejrot.jfif',
                isNew: true
            },
            {
                id: 'brownies',
                category: 'dessert',
                name: 'Brownies',
                description: 'Kue cokelat yang padat dan kaya rasa.',
                price: 28000,
                image: 'images/brownies.jfif',
                isNew: false
            },
            {
                id: 'redvelvetcake',
                category: 'dessert',
                name: 'Red Velvet Cake',
                description: 'Kue merah dengan lapisan krim keju yang lembut.',
                price: 35000,
                image: 'images/redvelvetcake.jfif',
                isNew: true
            },
            {
                id: 'lemontea',
                category: 'minuman',
                name: 'Lemon Tea',
                description: 'Teh segar dengan perasan lemon.',
                price: 12000,
                image: 'images/lemontea.jfif',
                isNew: false
            },
            {
                id: 'chickenwings',
                category: 'makanan',
                name: 'Chicken Wings',
                description: 'Sayap ayam goreng tepung dengan saus pedas.',
                price: 28000,
                image: 'images/chickenwings.jfif',
                isNew: false
            },
            {
                id: 'onionrings',
                category: 'cemilan',
                name: 'Onion Rings',
                description: 'Irisan bawang bombay goreng tepung.',
                price: 14000,
                image: 'images/onionrings.jfif',
                isNew: false
            }
        ];

        let currentCategory = 'all';
        let currentSort = 'newest';
        let currentView = 'list';
        let currentPage = 1;
        let searchTerm = '';
        let productStatus = 'all';
        let maxPrice = 50000;
        const itemsPerPage = 10; // Jumlah item per halaman

        // Fungsi untuk membuat dan merender tombol pagination
        function renderPagination(totalItems) {
            const paginationControls = document.getElementById('pagination-controls');
            if (!paginationControls) return;

            paginationControls.innerHTML = '';
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            if (totalPages <= 1) {
                return; // Tidak perlu pagination jika hanya ada satu halaman
            }

            // Tombol Sebelumnya (<)
            const prevButton = document.createElement('button');
            prevButton.innerHTML = '&lt;';
            prevButton.className =
                `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed border border-gray-200' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            prevButton.disabled = currentPage === 1;
            prevButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    sortAndRender();
                }
            });
            paginationControls.appendChild(prevButton);

            // Tombol nomor halaman dan elipsis
            const startPage = Math.max(1, currentPage - 1);
            const endPage = Math.min(totalPages, currentPage + 1);

            if (startPage > 1) {
                // Tombol halaman 1
                const pageButton1 = document.createElement('button');
                pageButton1.innerText = '1';
                pageButton1.className =
                    `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${1 === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
                pageButton1.addEventListener('click', () => {
                    currentPage = 1;
                    sortAndRender();
                });
                paginationControls.appendChild(pageButton1);

                if (startPage > 2) {
                    // Elipsis pertama
                    const ellipsis1 = document.createElement('span');
                    ellipsis1.innerText = '...';
                    ellipsis1.className = 'text-gray-500 mx-1';
                    paginationControls.appendChild(ellipsis1);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const pageButton = document.createElement('button');
                pageButton.innerText = i;
                pageButton.className =
                    `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${i === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
                pageButton.addEventListener('click', () => {
                    currentPage = i;
                    sortAndRender();
                });
                paginationControls.appendChild(pageButton);
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    // Elipsis kedua
                    const ellipsis2 = document.createElement('span');
                    ellipsis2.innerText = '...';
                    ellipsis2.className = 'text-gray-500 mx-1';
                    paginationControls.appendChild(ellipsis2);
                }
                // Tombol halaman terakhir
                const lastPageButton = document.createElement('button');
                lastPageButton.innerText = totalPages;
                lastPageButton.className =
                    `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${totalPages === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
                lastPageButton.addEventListener('click', () => {
                    currentPage = totalPages;
                    sortAndRender();
                });
                paginationControls.appendChild(lastPageButton);
            }

            // Tombol Selanjutnya (>)
            const nextButton = document.createElement('button');
            nextButton.innerHTML = '&gt;';
            nextButton.className =
                `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed border border-gray-200' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            nextButton.disabled = currentPage === totalPages;
            nextButton.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    sortAndRender();
                }
            });
            paginationControls.appendChild(nextButton);
        }

        // Fungsi untuk merender menu
        function renderMenu(items) {
            const menuList = document.getElementById('menu-list');
            if (!menuList) {
                console.error("Elemen dengan id 'menu-list' tidak ditemukan.");
                return;
            }

            // Mengosongkan konten menuList sebelum menambahkan item baru
            menuList.innerHTML = '';

            // Menambahkan kelas untuk tampilan grid responsif atau daftar
            if (currentView === 'list') {
                menuList.classList.remove('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-5', 'gap-4');
                menuList.classList.add('space-y-6');
            } else {
                menuList.classList.remove('space-y-6');
                menuList.classList.add('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-5', 'gap-4');
            }

            // Bagian PENTING: Membuat elemen HTML untuk setiap produk dan menampilkannya
            items.forEach(item => {
                const productItem = document.createElement('div');
                // Tambahkan konten HTML untuk produk di sini
                productItem.innerHTML = `
            <div class="product-item">
                <img src="${item.image}" alt="${item.name}" class="product-image">
                <h3 class="product-name">${item.name}</h3>
                <p class="product-price">${item.price}</p>
                <button class="detail-button">Detail</button>
            </div>
        `;
                menuList.appendChild(productItem);
            });

            menuList.innerHTML = '';
            items.forEach(item => {
                let itemHTML;
                if (currentView === 'list') {
                    itemHTML = `
                    <div class="flex justify-between items-start border-b border-gray-200 pb-6">
                        <div class="flex-grow space-y-2">
                            <h3 class="font-semibold text-lg">${item.name}</h3>
                            <p class="text-xs text-gray-600">${item.description}</p>
                            <p class="text-base font-bold text-[#994d51]">Rp${item.price.toLocaleString('id-ID')}</p>
                            <button class="detail-btn mt-2 bg-[#994d51] hover:bg-[#7a3c3f] text-white font-semibold px-4 py-1 text-sm rounded-full shadow transition duration-200" data-modal="product-modal-${item.id}">Detail</button>
                        </div>
                        <img src="${item.image}" alt="${item.name}" class="w-32 h-32 rounded-lg ml-6 object-cover" />
                    </div>
                `;
                } else {
                    itemHTML = `
                    <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4 text-center">
                        <img src="${item.image}" alt="${item.name}" class="w-24 h-24 rounded-lg object-cover mb-2" />
                        <h3 class="font-semibold text-sm">${item.name}</h3>
                        <p class="text-xs font-bold text-[#994d51]">Rp${item.price.toLocaleString('id-ID')}</p>
                        <button class="detail-btn mt-2 bg-[#994d51] hover:bg-[#7a3c3f] text-white font-semibold px-2 py-1 text-xs rounded-full shadow transition duration-200" data-modal="product-modal-${item.id}">Detail</button>
                    </div>
                `;
                }
                menuList.innerHTML += itemHTML;
            });

            addModalEventListeners();
        }

        // Fungsi utama untuk mengurutkan, memfilter, dan merender ulang
        function sortAndRender() {
            let itemsToRender;

            // 1. Filter berdasarkan kategori
            if (currentCategory === 'all') {
                itemsToRender = [...menuData];
            } else {
                itemsToRender = menuData.filter(item => item.category === currentCategory);
            }

            // 2. Filter berdasarkan pencarian (search term)
            if (searchTerm) {
                itemsToRender = itemsToRender.filter(item => item.name.toLowerCase().includes(searchTerm.toLowerCase()));
            }

            // 3. Filter berdasarkan status produk
            if (productStatus === 'new') {
                itemsToRender = itemsToRender.filter(item => item.isNew);
            } else if (productStatus === 'old') {
                itemsToRender = itemsToRender.filter(item => !item.isNew);
            }

            // 4. Filter berdasarkan harga
            itemsToRender = itemsToRender.filter(item => item.price <= maxPrice);

            // 5. Lanjutkan dengan pengurutan seperti biasa
            let sortedItems = [...itemsToRender];
            if (currentSort === 'cheapest') {
                sortedItems.sort((a, b) => a.price - b.price);
            } else if (currentSort === 'mostexpensive') {
                sortedItems.sort((a, b) => b.price - a.price);
            } else if (currentSort === 'newest') {
                sortedItems.sort((a, b) => b.isNew - a.isNew);
            }

            // 6. Lanjutkan dengan pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedItems = sortedItems.slice(startIndex, endIndex);

            renderMenu(paginatedItems);
            renderPagination(sortedItems.length);
        }

        function addModalEventListeners() {
            // Ambil semua tombol detail dan modal
            const detailButtons = document.querySelectorAll('.detail-btn');
            const modals = document.querySelectorAll('[id^="product-modal-"]');

            // Tambahkan event listener untuk tombol detail
            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.dataset.modal;
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden'; // Menonaktifkan scroll di body
                    }
                });
            });

            // Tambahkan event listener untuk tombol tutup modal
            modals.forEach(modal => {
                const closeModalButton = modal.querySelector('.close-modal');
                if (closeModalButton) {
                    closeModalButton.addEventListener('click', () => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = ''; // Mengaktifkan kembali scroll di body
                    });
                }

                // Menutup modal jika area di luar modal diklik
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }
                });
            });
        }

        // Tambahkan event listener untuk semua kontrol baru
        document.addEventListener('DOMContentLoaded', () => {
            sortAndRender();
            addModalEventListeners();

            // Event listener untuk sort dropdown
            const sortMenuBtn = document.getElementById('sort-menu-btn');
            const sortOptions = document.getElementById('sort-options');
            const sortLabel = document.getElementById('sort-label');
            if (sortMenuBtn) {
                sortMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    sortOptions.classList.toggle('hidden');
                });
            }
            if (sortOptions) {
                sortOptions.addEventListener('click', (e) => {
                    if (e.target.classList.contains('sort-option')) {
                        e.preventDefault();
                        currentSort = e.target.dataset.sortBy;
                        sortLabel.innerText = e.target.innerText;
                        currentPage = 1;
                        sortAndRender();
                        sortOptions.classList.add('hidden');
                    }
                });
            }

            // Event listener untuk kategori dropdown
            const filterCategoryBtn = document.getElementById('filter-category-btn');
            const categoryOptions = document.getElementById('category-options');
            const categoryLabel = document.getElementById('category-label');
            if (filterCategoryBtn) {
                filterCategoryBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    categoryOptions.classList.toggle('hidden');
                });
            }
            if (categoryOptions) {
                categoryOptions.addEventListener('click', (e) => {
                    if (e.target.classList.contains('category-option')) {
                        e.preventDefault();
                        currentCategory = e.target.dataset.category;
                        categoryLabel.innerText = e.target.innerText;
                        currentPage = 1;
                        sortAndRender();
                        categoryOptions.classList.add('hidden');
                    }
                });
            }

            // Event listener untuk view toggle
            const viewGridBtn = document.getElementById('view-grid');
            const viewListBtn = document.getElementById('view-list');
            if (viewGridBtn) {
                viewGridBtn.addEventListener('click', () => {
                    currentView = 'grid';
                    sortAndRender();
                });
            }
            if (viewListBtn) {
                viewListBtn.addEventListener('click', () => {
                    currentView = 'list';
                    sortAndRender();
                });
            }

            // Close dropdowns when clicking outside
            window.addEventListener('click', () => {
                if (sortOptions) sortOptions.classList.add('hidden');
                if (categoryOptions) categoryOptions.classList.add('hidden');
            });

            // Listener untuk Search Produk
            const searchInput = document.getElementById('search-product');
            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    searchTerm = e.target.value;
                    currentPage = 1;
                    sortAndRender();
                });
            }

            // Listener untuk Status Produk
            const statusRadios = document.querySelectorAll('input[name="product-status"]');
            statusRadios.forEach(radio => {
                radio.addEventListener('change', (e) => {
                    productStatus = e.target.id.replace('status-', '');
                    currentPage = 1;
                    sortAndRender();
                });
            });

            // Listener untuk Saring Harga
            const priceRangeInput = document.getElementById('price-range');
            const priceValueSpan = document.getElementById('price-value');
            if (priceRangeInput) {
                priceRangeInput.addEventListener('input', (e) => {
                    maxPrice = parseInt(e.target.value);
                    priceValueSpan.innerText = `Rp${maxPrice.toLocaleString('id-ID')}`;
                    currentPage = 1;
                    sortAndRender();
                });
            }

            // Toggle collapsible filter sections
            const toggleFilterSection = (btnId, contentId) => {
                const btn = document.getElementById(btnId);
                const content = document.getElementById(contentId);
                const icon = btn.querySelector('svg');
                if (btn && content && icon) {
                    btn.addEventListener('click', () => {
                        content.classList.toggle('hidden');
                        if (content.classList.contains('hidden')) {
                            icon.innerHTML =
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />';
                        } else {
                            icon.innerHTML =
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />';
                        }
                    });
                }
            };

            toggleFilterSection('toggle-search-btn', 'search-content');
            toggleFilterSection('toggle-status-btn', 'status-content');
            toggleFilterSection('toggle-price-btn', 'price-content');
        });
    </script>
@endsection
