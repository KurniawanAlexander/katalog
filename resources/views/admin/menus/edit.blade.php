@extends('layout.template')

@section('main')
    <h1 class="h3 mb-4 text-gray-800">Edit Menu</h1>

    <div class="card shadow">
        <div class="card-body">
            {{-- Tambahkan penanganan error di sini --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="edit-form" action="{{ route('menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Tambahkan input tersembunyi untuk menyimpan nomor halaman --}}
                <input type="hidden" name="page" value="{{ request()->query('page', 1) }}">

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Menu</label>
                    <input type="text" name="name" value="{{ $menu->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="text" id="price" name="price"
                        value="Rp {{ number_format($menu->price, 0, ',', '.') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Gambar</label><br>
                    @if ($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" width="80" class="mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Menu Baru?</label>
                    <select name="is_new" class="form-control" required>
                        <option value="0" {{ old('is_new', $menu->is_new) == 0 ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ old('is_new', $menu->is_new) == 1 ? 'selected' : '' }}>Ya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="is_available" class="form-control" required>
                        <option value="1" {{ old('is_available', $menu->is_available) == 1 ? 'selected' : '' }}>
                            Tersedia</option>
                        <option value="0" {{ old('is_available', $menu->is_available) == 0 ? 'selected' : '' }}>Habis
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- Perbaiki tombol Kembali agar membawa ke halaman yang sama --}}
                <a href="{{ route('menus.index', ['page' => request()->query('page', 1)]) }}"
                    class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const form = document.getElementById('edit-form');

            // Format input saat pengguna mengetik
            priceInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value) {
                    e.target.value = formatRupiah(value);
                } else {
                    e.target.value = '';
                }
            });

            // Hapus format saat form disubmit
            form.addEventListener('submit', function() {
                let formattedValue = priceInput.value;
                let rawValue = formattedValue.replace(/Rp\s?\.?/g, '').replace(/\./g, '');
                priceInput.value = rawValue;
            });

            function formatRupiah(angka) {
                let numberString = angka.toString();
                let sisa = numberString.length % 3;
                let rupiah = numberString.substr(0, sisa);
                let ribuan = numberString.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                return 'Rp ' + rupiah;
            }
        });
    </script>
@endpush
