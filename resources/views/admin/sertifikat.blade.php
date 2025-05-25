@extends('template.template')

<div class="title-kegiatan">
    <h1>Kelola Sertifikat</h1>
</div>

<!-- Tombol Tambah Sertifikat -->
<div class="kotak-sertifikat">
    <button id="btn-tambah-sertifikat" class="tambah-kegiatan">+ Tambah Sertifikat</button>
</div>

<!-- Form Tambah Sertifikat -->
<div id="form-tambah-sertifikat" style="display: none;" class="kotak">
    <form action="{{ route('admin.sertifikat.store') }}" method="POST">
        @csrf
        <select name="kegiatan_id" required>
            <option value="">Pilih Kegiatan</option>
            @foreach (\App\Models\Kegiatan::all() as $kegiatan)
                <option value="{{ $kegiatan->id }}">{{ $kegiatan->judul }}</option>
            @endforeach
        </select>
        <input type="url" name="file" placeholder="Link Google Drive" required>
        <input type="date" name="tanggal_terbit" required>
        <button type="submit" class="tambah-kegiatan">Simpan Sertifikat</button>
    </form>
</div>

<!-- Dropdown Filter -->
<div class="dropdown-filters">
    <form action="{{ route('admin.sertifikat') }}" method="GET">
        <select class="form-select" name="filter" onchange="this.form.submit()">
            <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>Semua Kegiatan</option>
            <option value="INFEST" {{ $filter === 'INFEST' ? 'selected' : '' }}>INFEST</option>
            <option value="POINT" {{ $filter === 'POINT' ? 'selected' : '' }}>POINT</option>
            <option value="DETIK" {{ $filter === 'DETIK' ? 'selected' : '' }}>DETIK</option>
        </select>
    </form>
</div>

<!-- Tabel Sertifikat -->
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
            @foreach ($sertifikat as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan ?? ($item->kegiatan->judul ?? '-') }}</td>
                    <td><a href="{{ $item->file }}" target="_blank">Lihat File</a></td>
                    <td>{{ $item->tanggal_terbit }}</td>
                    <td>
                        <form action="{{ route('admin.sertifikat.destroy', $item->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                        <button class="btn btn-primary" onclick="toggleEditForm({{ $item->id }})">Edit</button>
                    </td>
                </tr>
                <!-- Form Edit Sertifikat -->
                <div id="form-edit-sertifikat-{{ $item->id }}" style="display: none;" class="kotak">
                    <form action="{{ route('admin.sertifikat.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nama_kegiatan" value="{{ $item->nama_kegiatan }}" required>
                        <input type="url" name="file" value="{{ $item->file }}" required>
                        <input type="date" name="tanggal_terbit" value="{{ $item->tanggal_terbit }}" required>
                        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                    </form>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('btn-tambah-sertifikat').addEventListener('click', function() {
        const form = document.getElementById('form-tambah-sertifikat');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });

    function toggleEditForm(id) {
        const form = document.getElementById(`form-edit-sertifikat-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    function toggleEditForm(id) {
        const form = document.getElementById(`form-edit-sertifikat-${id}`);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
