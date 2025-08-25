@extends('layout.template')

@section('main')
    <h1 class="h3 mb-4 text-gray-800">Tambah Menu</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Menu</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                @push('scripts')
                    <script>
                        document.getElementById('price').addEventListener('input', function(e) {
                            let value = e.target.value.replace(/\D/g, ''); // hapus semua non-angka
                            if (value) {
                                e.target.value = formatRupiah(value);
                            } else {
                                e.target.value = '';
                            }
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
                    </script>
                @endpush

                <div class="mb-3">
                    <label>Gambar</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Menu Baru?</label>
                    <select name="is_new" class="form-control">
                        <option value="1" {{ old('is_new', $menu->is_new ?? 1) == 1 ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ old('is_new', $menu->is_new ?? 1) == 0 ? 'selected' : '' }}>Tidak</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="is_available" class="form-control">
                        <option value="1" {{ old('is_available', $menu->is_available ?? 1) == 1 ? 'selected' : '' }}>
                            Tersedia</option>
                        <option value="0" {{ old('is_available', $menu->is_available ?? 1) == 0 ? 'selected' : '' }}>
                            Habis</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
