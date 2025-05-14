@extends('template.template')

<div class="title-kegiatan d-flex justify-content-between align-items-center mt-3">
    <h1>Kelola Dokumentasi</h1>
    <button class="tambah-kegiatan" id="btn-tambah">+ Tambah Dokumentasi</button>
</div>

<!-- Form Tambah Dokumentasi (Disembunyikan secara default) -->
<div id="form-dokumentasi" style="display: none; margin-top: 20px;">
    <form action="{{ route('admin.dokumentasi.store') }}" method="POST">
        @csrf
        <div class="kotak_dokumentasi">
            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
        </div>
        <div class="kotak_dokumentasi">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="kotak_dokumentasi">
            <label for="url" class="form-label">URL Dokumentasi</label>
            <input type="url" class="form-control" id="url" name="url"
                placeholder="https://example.com/file.pdf" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<!-- Search, Filter, and Table -->
<form action="" class="search mt-3">
    <input type="text" placeholder="Cari Dokumentasi...." class="form-control" id="search">
    <button type="submit" class="btn btn-secondary mt-2">Cari</button>
</form>

<div class="dropdown-filters mt-3">
    <select class="form-select" id="kegiatan-filter">
        <option value="all">Semua Kegiatan</option>
        <option value="infest">INFEST</option>
        <option value="point">POINT</option>
        <option value="detik">DETIK</option>
    </select>
</div>

<div class="table-container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Deskripsi</th>
                <th>URL Dokumentasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumentasi as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.dokumentasi.update', $item->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{ route('admin.dokumentasi.destroy', $item->id) }}" method="POST"
                            class="d-inline">
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

<!-- JavaScript untuk Toggle Form -->
<script>
    const btnTambah = document.getElementById('btn-tambah');
    const formDokumentasi = document.getElementById('form-dokumentasi');

    btnTambah.addEventListener('click', function() {
        if (formDokumentasi.style.display === "none") {
            formDokumentasi.style.display = "block";
            btnTambah.textContent = "- Batal Tambah Dokumentasi";
        } else {
            formDokumentasi.style.display = "none";
            btnTambah.textContent = "+ Tambah Dokumentasi";
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
