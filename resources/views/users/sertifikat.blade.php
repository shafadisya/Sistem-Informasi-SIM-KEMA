@extends('template.template_user')

<div class="title-kegiatan">
    <h1>Kelola Sertifikat</h1>
</div>

<!-- Dropdown Filter -->
<div class="dropdown-filters">
    <form action="{{ route('users.sertifikat') }}" method="GET">
        <select class="form-select" name="filter" onchange="this.form.submit()">
            <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>Semua Kegiatan</option>
            @foreach ($kegiatanDiterima as $id => $judul)
                <option value="{{ $id }}" {{ $filter == $id ? 'selected' : '' }}>{{ $judul }}</option>
            @endforeach
        </select>
    </form>
</div>

<!-- Tabel Sertifikat -->
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>URL</th>
                <th>Tanggal Terbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sertifikat as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td><a href="{{ $item->file }}" target="_blank">Lihat File</a></td>
                    <td>{{ $item->tanggal_terbit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
