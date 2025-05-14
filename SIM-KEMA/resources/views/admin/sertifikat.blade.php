@extends('template.template')
<div class="title-kegiatan">
    <h1>Kelola Sertifikat</h1>
</div>
<div class="tambah">
    <span><button class="tambah-kegiatan">+ Tambah Sertifikat</button></span>
</div>
</div>
<form action="" class="search">
    <input type="text" placeholder="Cari Sertifikat...." class="form-control" id="search">
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
                <th>File</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>INFEST</td>
                <td>sertifikat_infest.pdf</td>
                <td>13 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>POINT</td>
                <td>sertifikat_point.pdf</td>
                <td>10 Mei 2025</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>DETIK</td>
                <td>sertifikat_detik.pdf</td>
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
