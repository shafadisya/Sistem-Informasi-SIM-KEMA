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
                <th>NPM</th>
                <th>No. WA</th>
                <th>Divisi</th>
                <th>Role</th>
                <th>Panitia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftaran as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->no_wa }}</td>
                    <td>{{ $item->divisi }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->panitia }}</td>
                    <td>
                        <form action="{{ route('admin.panitia.konfirmasi', $item->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button name="status" value="diterima" class="btn-accept">Terima</button>
                            <button name="status" value="ditolak" class="btn-reject">Tolak</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada pendaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>
