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
            <tr>
                <td>INFEST</td>
                <td>Berikut kami tampilkan file dokumentasi</td>
                <td>13 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>POINT</td>
                <td>Berikut kami tampilkan file dokumentasi</td>
                <td>10 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>DETIK</td>
                <td>Berikut kami tampilkan file dokumentasi</td>
                <td>8 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>
