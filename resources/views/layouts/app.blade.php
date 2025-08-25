<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kopi Seduh Pagi</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-[#1b0e0e]">

    <header
        class="fixed top-0 w-full z-50 bg-white border-b border-[#f3e7e8] px-4 sm:px-6 md:px-8 py-4 header-transition">
        <div class="max-w-6xl mx-auto flex justify-between items-center relative">
            <div class="flex items-center gap-4">
                <div class="w-6 h-6 text-[#994d51]">
                    <svg viewBox="0 0 48 48" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 18.4228L42 11.475V34.3663C42 34.7796 41.7457 35.1504 41.3601 35.2992L24 42V18.4228Z" />
                        <path
                            d="M24 8.18819L33.4123 11.574L24 15.2071L14.5877 11.574L24 8.18819ZM9 15.8487L21 20.4805V37.6263L9 32.9945V15.8487ZM27 37.6263V20.4805L39 15.8487V32.9945L27 37.6263ZM25.354 2.29885C24.4788 1.98402 23.5212 1.98402 22.646 2.29885L4.98454 8.65208C3.7939 9.08038 3 10.2097 3 11.475V34.3663C3 36.0196 4.01719 37.5026 5.55962 38.098L22.9197 44.7987C23.6149 45.0671 24.3851 45.0671 25.0803 44.7987L42.4404 38.098C43.9828 37.5026 45 36.0196 45 34.3663V11.475C45 10.2097 44.2061 9.08038 43.0155 8.65208L25.354 2.29885Z" />
                    </svg>
                </div>
                <h1 class="text-lg font-bold">Kopi Seduh Pagi</h1>
            </div>
        </div>

        <style>
            /* Gaya dasar untuk card */
            .card-category {
                background-color: #fff;
                border-radius: 1.5rem;
                /* 2xl = 24px */
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                /* shadow-md */
                overflow: hidden;
                transition: transform 0.3s ease-in-out;
            }

            /* Gaya saat di-hover (efek animasi) */
            .card-category:hover {
                transform: scale(1.05);
                /* Memperbesar 5% */
            }

            /* Gaya untuk teks */
            .section-title {
                text-align: center;
                font-size: 1.5rem;
                /* 2xl */
                font-weight: 700;
                /* bold */
                margin-bottom: 2rem;
                /* mb-8 */
            }

            .card-title {
                font-weight: 600;
                /* semibold */
            }

            .card-description {
                font-size: 0.875rem;
                /* sm */
                color: #4b5563;
                /* gray-600 */
            }
        </style>
    </header>

    <div
        class="relative overflow-hidden rounded-none shadow-lg bg-[#2a1a1a] w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] max-w-none h-96 top-0 z-40">
        <div id="image-carousel" class="absolute inset-0 flex transition-transform duration-1000 ease-in-out">
            <div class="w-screen flex-shrink-0 relative">
                <img src="{{ asset('assets/images/background4.jpg') }}" alt="Promo Spesial"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 flex items-center justify-center text-center p-12">
                    <div class="relative z-10">
                        <h3 class="text-4xl font-bold text-white drop-shadow-lg">Promo Kopi Spesial</h3>
                        <p class="text-lg text-gray-200 mt-2 drop-shadow-lg">Dapatkan diskon 20% untuk semua varian kopi
                            pilihan.</p>
                    </div>
                </div>
            </div>
            <div class="w-screen flex-shrink-0 relative">
                <img src="{{ asset('assets/images/background5.jpg') }}" alt="Produk Terbaru"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 flex items-center justify-center text-center p-12">
                    <div class="relative z-10">
                        <h3 class="text-4xl font-bold text-white drop-shadow-lg">Kopi Arabika Gayo</h3>
                        <p class="text-lg text-gray-200 mt-2 drop-shadow-lg">Nikmati sensasi rasa baru dari biji kopi
                            Gayo premium.</p>
                    </div>
                </div>
            </div>
            <div class="w-screen flex-shrink-0 relative">
                <img src="{{ asset('assets/images/background6.jpg') }}" alt="Event Mendatang"
                    class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 flex items-center justify-center text-center p-12">
                    <div class="relative z-10">
                        <h3 class="text-4xl font-bold text-white drop-shadow-lg">Workshop Meracik Kopi</h3>
                        <p class="text-lg text-gray-200 mt-2 drop-shadow-lg">Ikuti workshop kami dan jadi barista
                            handal!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="w-full mx-auto py-8 px-4 space-y-10 pt-5">

        @yield('content')

        <script>
            // Data menu dan variabel lainnya
            // const menuData = [];

            // let currentCategory = 'all';
            let currentSort = 'newest';
            let currentView = 'list';
            let currentPage = 1;
            let searchTerm = '';
            let productStatus = 'all';
            let maxPrice = 50000;
            let productStock = 'all';
            let minPriceRange = 0;
            let maxPriceRange = Infinity; // Menggunakan Infinity sebagai nilai awal untuk mempermudah logika
            const itemsPerPage = 10; // Jumlah item per halaman
            const minPriceInput = document.getElementById('min-price-input');
            const maxPriceInput = document.getElementById('max-price-input');
            const applyPriceBtn = document.getElementById('apply-price-btn');
            const resultDisplay = document.getElementById('menu-list');

            function formatRupiah(number) {
                if (isNaN(number) || number === null) return '';
                const formatted = new Intl.NumberFormat('id-ID').format(number);
                return formatted;
            }

            minPriceInput.addEventListener('input', (e) => {
                // Hapus semua karakter non-digit kecuali yang pertama jika itu adalah '-'
                let value = e.target.value.replace(/[^\d]/g, '');
                e.target.value = formatRupiah(value);
            });

            maxPriceInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/[^\d]/g, '');
                e.target.value = formatRupiah(value);
            });

            // Fungsi untuk membuat dan merender tombol pagination
            // function renderPagination(totalItems) {
            //     const paginationControls = document.getElementById('pagination-controls');
            //     if (!paginationControls) return;

            //     paginationControls.innerHTML = '';
            //     const totalPages = Math.ceil(totalItems / itemsPerPage);

            //     if (totalPages <= 1) {
            //         return; // Tidak perlu pagination jika hanya ada satu halaman
            //     }

            //     // Tombol Sebelumnya (<)
            //     const prevButton = document.createElement('button');
            //     prevButton.innerHTML = '&lt;';
            //     prevButton.className =
            //         `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed border border-gray-200' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            //     prevButton.disabled = currentPage === 1;
            //     prevButton.addEventListener('click', () => {
            //         if (currentPage > 1) {
            //             currentPage--;
            //             sortAndRender();
            //         }
            //     });
            //     paginationControls.appendChild(prevButton);

            //     // Tombol nomor halaman dan elipsis
            //     const startPage = Math.max(1, currentPage - 1);
            //     const endPage = Math.min(totalPages, currentPage + 1);

            //     if (startPage > 1) {
            //         // Tombol halaman 1
            //         const pageButton1 = document.createElement('button');
            //         pageButton1.innerText = '1';
            //         pageButton1.className =
            //             `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${1 === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            //         pageButton1.addEventListener('click', () => {
            //             currentPage = 1;
            //             sortAndRender();
            //         });
            //         paginationControls.appendChild(pageButton1);

            //         if (startPage > 2) {
            //             // Elipsis pertama
            //             const ellipsis1 = document.createElement('span');
            //             ellipsis1.innerText = '...';
            //             ellipsis1.className = 'text-gray-500 mx-1';
            //             paginationControls.appendChild(ellipsis1);
            //         }
            //     }

            //     for (let i = startPage; i <= endPage; i++) {
            //         const pageButton = document.createElement('button');
            //         pageButton.innerText = i;
            //         pageButton.className =
            //             `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${i === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            //         pageButton.addEventListener('click', () => {
            //             currentPage = i;
            //             sortAndRender();
            //         });
            //         paginationControls.appendChild(pageButton);
            //     }

            //     if (endPage < totalPages) {
            //         if (endPage < totalPages - 1) {
            //             // Elipsis kedua
            //             const ellipsis2 = document.createElement('span');
            //             ellipsis2.innerText = '...';
            //             ellipsis2.className = 'text-gray-500 mx-1';
            //             paginationControls.appendChild(ellipsis2);
            //         }
            //         // Tombol halaman terakhir
            //         const lastPageButton = document.createElement('button');
            //         lastPageButton.innerText = totalPages;
            //         lastPageButton.className =
            //             `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${totalPages === currentPage ? 'bg-[#994d51] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            //         lastPageButton.addEventListener('click', () => {
            //             currentPage = totalPages;
            //             sortAndRender();
            //         });
            //         paginationControls.appendChild(lastPageButton);
            //     }

            //     // Tombol Selanjutnya (>)
            //     const nextButton = document.createElement('button');
            //     nextButton.innerHTML = '&gt;';
            //     nextButton.className =
            //         `w-8 h-8 flex items-center justify-center rounded-md text-sm transition ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed border border-gray-200' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'}`;
            //     nextButton.disabled = currentPage === totalPages;
            //     nextButton.addEventListener('click', () => {
            //         if (currentPage < totalPages) {
            //             currentPage++;
            //             sortAndRender();
            //         }
            //     });
            //     paginationControls.appendChild(nextButton);
            // }

            // Fungsi untuk merender menu
            //     function renderMenu(items) {
            //         const menuList = document.getElementById('menu-list');
            //         if (!menuList) {
            //             console.error("Elemen dengan id 'menu-list' tidak ditemukan.");
            //             return;
            //         }

            //         // Mengosongkan konten menuList sebelum menambahkan item baru
            //         menuList.innerHTML = '';

            //         // Menambahkan kelas untuk tampilan grid responsif atau daftar
            //         if (currentView === 'list') {
            //             menuList.classList.remove('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-5', 'gap-4');
            //             menuList.classList.add('space-y-6');
            //         } else {
            //             menuList.classList.remove('space-y-6');
            //             menuList.classList.add('grid', 'grid-cols-2', 'md:grid-cols-3', 'lg:grid-cols-5', 'gap-4');
            //         }

            //         // Bagian PENTING: Membuat elemen HTML untuk setiap produk dan menampilkannya
            //         items.forEach(item => {
            //             const productItem = document.createElement('div');
            //             // Tambahkan konten HTML untuk produk di sini
            //             productItem.innerHTML = `
    //     <div class="product-item">
    //         <img src="${item.image}" alt="${item.name}" class="product-image">
    //         <h3 class="product-name">${item.name}</h3>
    //         <p class="product-price">${item.price}</p>
    //         <button class="detail-button">Detail</button>
    //     </div>
    // `;
            //             menuList.appendChild(productItem);
            //         });

            //         menuList.innerHTML = '';
            //         items.forEach(item => {
            //             let itemHTML;
            //             if (currentView === 'list') {
            //                 itemHTML = `
    //             <div class="flex justify-between items-start border-b border-gray-200 pb-6">
    //                 <div class="flex-grow space-y-2">
    //                     <h3 class="font-semibold text-lg">${item.name}</h3>
    //                     <p class="text-xs text-gray-600">${item.description}</p>
    //                     <p class="text-base font-bold text-[#994d51]">Rp${item.price.toLocaleString('id-ID')}</p>
    //                     <button class="detail-btn mt-2 bg-[#994d51] hover:bg-[#7a3c3f] text-white font-semibold px-4 py-1 text-sm rounded-full shadow transition duration-200" data-modal="product-modal-${item.id}">Detail</button>
    //                 </div>
    //                 <img src="${item.image}" alt="${item.name}" class="w-32 h-32 rounded-lg ml-6 object-cover" />
    //             </div>
    //         `;
            //             } else {
            //                 itemHTML = `
    //             <div class="flex flex-col items-center border border-gray-200 rounded-lg p-4 text-center">
    //                 <img src="${item.image}" alt="${item.name}" class="w-24 h-24 rounded-lg object-cover mb-2" />
    //                 <h3 class="font-semibold text-sm">${item.name}</h3>
    //                 <p class="text-xs font-bold text-[#994d51]">Rp${item.price.toLocaleString('id-ID')}</p>
    //                 <button class="detail-btn mt-2 bg-[#994d51] hover:bg-[#7a3c3f] text-white font-semibold px-2 py-1 text-xs rounded-full shadow transition duration-200" data-modal="product-modal-${item.id}">Detail</button>
    //             </div>
    //         `;
            //             }
            //             menuList.innerHTML += itemHTML;
            //         });

            //         addModalEventListeners();
            //     }

            // Fungsi utama untuk mengurutkan, memfilter, dan merender ulang
            // function sortAndRender() {
            //     let itemsToRender;

            //     // 1. Filter berdasarkan kategori
            //     if (currentCategory === 'all') {
            //         itemsToRender = [...menuData];
            //     } else {
            //         itemsToRender = menuData.filter(item => item.category === currentCategory);
            //     }

            //     // 2. Filter berdasarkan pencarian (search term)
            //     if (searchTerm) {
            //         itemsToRender = itemsToRender.filter(item => item.name.toLowerCase().includes(searchTerm.toLowerCase()));
            //     }

            //     // 3. Filter berdasarkan status produk
            //     if (productStatus === 'new') {
            //         itemsToRender = itemsToRender.filter(item => item.isNew);
            //     } else if (productStatus === 'old') {
            //         itemsToRender = itemsToRender.filter(item => !item.isNew);
            //     }

            //     // 4. Filter berdasarkan harga
            //     itemsToRender = itemsToRender.filter(item => item.price <= maxPrice);

            //     // 5. Lanjutkan dengan pengurutan seperti biasa
            //     let sortedItems = [...itemsToRender];
            //     if (currentSort === 'cheapest') {
            //         sortedItems.sort((a, b) => a.price - b.price);
            //     } else if (currentSort === 'mostexpensive') {
            //         sortedItems.sort((a, b) => b.price - a.price);
            //     } else if (currentSort === 'newest') {
            //         sortedItems.sort((a, b) => b.isNew - a.isNew);
            //     }

            //     // 6. Lanjutkan dengan pagination
            //     const startIndex = (currentPage - 1) * itemsPerPage;
            //     const endIndex = startIndex + itemsPerPage;
            //     const paginatedItems = sortedItems.slice(startIndex, endIndex);

            //     renderMenu(paginatedItems);
            //     renderPagination(sortedItems.length);
            // }

            function addModalEventListeners() {
                // Ambil semua tombol detail dan modal
                const detailButtons = document.querySelectorAll('.detail-btn');
                const modals = document.querySelectorAll('[id^="product-modal-"]');

                // Tambahkan event listener untuk tombol detail
                detailButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modalId = button.dataset.modal;
                        const modal = document.getElementById(modalId);

                        // Ambil ID produk dari modalId
                        const productId = modalId.replace('product-modal-', '');
                        // Cari data produk yang sesuai dari array `menuData`
                        const product = menuData.find(item => item.id === productId);

                        if (modal && product) {
                            // Cari elemen gambar dan overlay stok di dalam modal
                            const modalImage = modal.querySelector('img');
                            const stockOverlay = modal.querySelector('.stock-overlay');

                            // Atur visibilitas gambar dan overlay berdasarkan ketersediaan produk
                            if (!product.isAvailable) {
                                modalImage.classList.add('opacity-50');
                                if (stockOverlay) {
                                    stockOverlay.classList.remove('hidden');
                                }
                            } else {
                                modalImage.classList.remove('opacity-50');
                                if (stockOverlay) {
                                    stockOverlay.classList.add('hidden');
                                }
                            }

                            modal.classList.remove('hidden');
                            document.body.style.overflow = 'hidden';
                        }
                    });
                });

                // Tambahkan event listener untuk tombol "Terapkan"
                // Perbaiki logika di tombol "Terapkan"
                applyPriceBtn.addEventListener('click', () => {
                    // Ambil nilai dari input yang sudah diformat
                    const rawMinPrice = minPriceInput.value;
                    const rawMaxPrice = maxPriceInput.value;

                    // Bersihkan nilai dari titik sebelum parsing
                    const cleanedMinPrice = rawMinPrice.replace(/\./g, '');
                    const cleanedMaxPrice = rawMaxPrice.replace(/\./g, '');

                    // Konversi string yang sudah bersih ke integer
                    minPriceRange = cleanedMinPrice ? parseInt(cleanedMinPrice) : 0;
                    maxPriceRange = cleanedMaxPrice ? parseInt(cleanedMaxPrice) : Infinity;

                    // Pastikan nilai tidak NaN (Not a Number) sebelum filter
                    if (isNaN(minPriceRange)) {
                        minPriceRange = 0;
                    }
                    if (isNaN(maxPriceRange)) {
                        maxPriceRange = Infinity;
                    }

                    // Panggil fungsi utama untuk mengurutkan dan me-render ulang
                    sortAndRender();
                });

                // Tambahkan event listener untuk tombol tutup modal
                modals.forEach(modal => {
                    const closeModalButton = modal.querySelector('.close-modal');
                    if (closeModalButton) {
                        closeModalButton.addEventListener('click', () => {
                            modal.classList.add('hidden');
                            document.body.style.overflow = '';
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


            // Listener untuk Search Produk
            // const searchInput = document.getElementById('search-product');
            // if (searchInput) {
            //     searchInput.addEventListener('input', (e) => {
            //         searchTerm = e.target.value;
            //         currentPage = 1;
            //         sortAndRender();
            //     });
            // }

            // Listener untuk Status Produk
            // const statusRadios = document.querySelectorAll('input[name="product-status"]');
            // statusRadios.forEach(radio => {
            //     radio.addEventListener('change', (e) => {
            //         productStatus = e.target.id.replace('status-', '');
            //         currentPage = 1;
            //         sortAndRender();
            //     });
            // });

            // Listener untuk Saring Harga
            // const priceRangeInput = document.getElementById('price-range');
            // const priceValueSpan = document.getElementById('price-value');
            // if (priceRangeInput) {
            //     priceRangeInput.addEventListener('input', (e) => {
            //         maxPrice = parseInt(e.target.value);
            //         priceValueSpan.innerText = `Rp${maxPrice.toLocaleString('id-ID')}`;
            //         currentPage = 1;
            //         sortAndRender();
            //     });
            // }

            // Toggle collapsible filter sections
        </script>



        <!-- Modal untuk Kopi Susu Aren -->




        <!-- Script Fungsi Tab dan Modal (Disederhanakan & Diperbaiki) -->

    </main>

    @include('layouts.footer')


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('.content-section');

            const showSection = (sectionId) => {
                sections.forEach(section => {
                    section.classList.remove('active-section');
                });
                const targetSection = document.querySelector(sectionId);
                if (targetSection) {
                    targetSection.classList.add('active-section');
                }
            };

            const setActiveLink = (linkId) => {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });
                const targetLink = document.querySelector(`a[href="${linkId}"]`);
                if (targetLink) {
                    targetLink.classList.add('active');
                }
            };

            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = e.target.getAttribute('href');
                    showSection(targetId);
                    setActiveLink(targetId);
                });
            });

            const defaultSection = window.location.hash || '#dashboard';
            showSection(defaultSection);
            setActiveLink(defaultSection);
        });
    </script>

    <script>
        // Kode JavaScript untuk toggle mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const carousel = document.getElementById('image-carousel');
            const totalSlides = carousel.children.length;
            let currentIndex = 0;

            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', function() {
                    if (mobileMenu.classList.contains('-translate-y-full')) {
                        mobileMenu.classList.remove('hidden', '-translate-y-full');
                        mobileMenu.classList.add('translate-y-0');
                    } else {
                        mobileMenu.classList.remove('translate-y-0');
                        mobileMenu.classList.add('-translate-y-full');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                        }, 300); // Sesuaikan dengan durasi transisi
                    }
                });

                // Menutup menu jika salah satu link diklik
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.remove('translate-y-0');
                        mobileMenu.classList.add('-translate-y-full');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                        }, 300);
                    });
                });
            }

            setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
            }, 3000); // 1000 milidetik = 1 detik
        });
    </script>

    <script>
        const header = document.querySelector('header');
        const scrollThreshold = 100; // Jarak gulir (dalam piksel) sebelum animasi dimulai

        window.addEventListener('scroll', () => {
            if (window.scrollY > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    <button id="scrollToTopBtn"
        class="fixed bottom-8 right-8 z-50 w-12 h-12 rounded-full bg-[#994d51] bg-opacity-10 shadow-lg flex items-center justify-center transition-opacity opacity-20 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8 14l4-4 4 4" />
        </svg>
    </button>

    <script>
        // Tombol scroll to top
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollToTopBtn.classList.add('opacity-100');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollToTopBtn.classList.remove('opacity-100');
            }
        });
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
