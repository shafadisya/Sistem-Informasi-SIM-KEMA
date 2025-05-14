@extends('template.template')
<div class="title-kegiatan">
    <h1>Kelola Panitia</h1>
</div>
<div class="tambah">
    <span><button class="tambah-kegiatan">+ Tambah Panitia</button></span>
</div>
</div>
<form action="" class="search">
    <input type="text" placeholder="Cari Panitia...." class="form-control" id="search">
    <button type="submit">Cari</button>
</form>

<div class="dropdown-filters">
    <select class="form-select" id="divisi-filter">
        <option value="all">Semua Divisi</option>
        <option value="ppm">PPM</option>
        <option value="kominkraf">KOMINKRAF</option>
        <option value="dph">DPH</option>
    </select>

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
                <th>Nama</th>
                <th>Role</th>
                <th>Divisi</th>
                <th>Status</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Amirul Mirdas</td>
                <td>Ketua</td>
                <td>PPM</td>
                <td>Aktif</td>
                <td>13 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>Amirul Mirdas</td>
                <td>Anggota</td>
                <td>KOMINKRAF</td>
                <td>Nonaktif</td>
                <td>10 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>Amirul Mirdas</td>
                <td>Anggota</td>
                <td>DPH</td>
                <td>Aktif</td>
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
