@extends('template.template_user')

<div class="title-kegiatan d-flex justify-content-between align-items-center">
    <h1>Kelola Dokumentasi</h1>
</div>

<form action="" class="search">
    <input type="text" placeholder="Cari Dokumentasi...." class="form-control" id="search">
    <button type="submit">Cari</button>
</form>

<div class="dropdown-filters">
    <form method="GET" action="{{ route('users.dokumentasi') }}">
        <select class="form-select" name="filter" onchange="this.form.submit()">
            <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Semua Kegiatan</option>
            @foreach ($namaKegiatanList as $id => $judul)
                <option value="{{ $id }}" {{ $filter == $id ? 'selected' : '' }}>{{ $judul }}</option>
            @endforeach
        </select>
    </form>
</div>

<div class="main-content">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Url</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumentasi as $item)
                    <tr>
                        <td>{{ $item->nama_kegiatan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->url }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="kotak" id="form-tambah" style="display: none;">
        <form id="dokumentasi-form" action="{{ route('admin.dokumentasi.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">
            <input type="hidden" name="id" id="dokumentasi_id">
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
        </form>
    </div>
</div>
