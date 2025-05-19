@extends('template.template')
<div class="title-kegiatan d-flex justify-content-between align-items-center">
    <h1>Kelola Dokumentasi</h1>
    <button class="tambah-kegiatan" id="btn-tambah">+ Tambah Dokumentasi</button>
</div>

</div>
<form action="" class="search">
    <input type="text" placeholder="Cari Dokumentasi...." class="form-control" id="search">
    <button type="submit">Cari</button>
</form>

<div class="dropdown-filters">
    <select class="form-select" id="kegiatan-filter">
        <option value="all">Semua Kegiatan</option>
        <option value="infest">INFEST</option>
        <option value="point">POINT</option>
        <option value="detik">DETIK</option>
    </select>
</div>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Deskripsi</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumentasi as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->file }}</td>
                    <td>
                        <form action="{{ route('admin.dokumentasi.update', $item->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{ route('admin.dokumentasi.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin.dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL Dokumentasi</label>
                <input type="url" class="form-control" id="url" name="url"
                    placeholder="https://example.com/file.pdf" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
<script>
    document.getElementById('btn-tambah').addEventListener('click', function() {
        // Fokus pada input nama kegiatan di sidebar
        document.getElementById('nama_kegiatan').focus();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
