@extends('template.template')
</div>
</div>
<div class="title-kegiatan">
    <h1>Kelola Dokumentasi</h1>
</div>
<div class="tambah">
    <span><button class="tambah-kegiatan">+ Tambah Dokumentasi</button></span>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
