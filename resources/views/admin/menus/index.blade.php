@extends('layout.template')

@section('main')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menu</h1>
        <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Menu
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Menu Baru</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr>
                            <td>{{ $menus->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                        width="50">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->category->name }}</td>
                            <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($menu->is_new)
                                    <span class="badge bg-primary text-white">Baru</span>
                                @else
                                    <span class="badge bg-secondary text-white">Tidak</span>
                                @endif
                            </td>
                            <td>
                                @if ($menu->is_available)
                                    <span class="badge bg-success text-white">Tersedia</span>
                                @else
                                    <span class="badge bg-danger text-white">Habis</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada menu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $menus->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
