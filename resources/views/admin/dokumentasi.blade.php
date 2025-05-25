@extends('template.template')

<div class="title-kegiatan d-flex justify-content-between align-items-center">
    <h1>Kelola Dokumentasi</h1>
    <button class="tambah-kegiatan" id="btn-tambah">+ Tambah Dokumentasi</button>
</div>

<form action="" class="search">
    <input type="text" placeholder="Cari Dokumentasi...." class="form-control" id="search">
    <button type="submit">Cari</button>
</form>

<div class="dropdown-filters">
    <form method="GET" action="{{ route('admin.dokumentasi') }}">
        <select class="form-select" id="kegiatan-filter" name="filter" onchange="this.form.submit()">
            <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Semua Kegiatan</option>
            @foreach ($namaKegiatanList as $nama)
                <option value="{{ $nama }}" {{ $filter == $nama ? 'selected' : '' }}>{{ $nama }}
                </option>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumentasi as $item)
                    <tr>
                        <td>{{ $item->nama_kegiatan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->url }}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{ $item->id }}"
                                data-nama="{{ $item->nama_kegiatan }}" data-deskripsi="{{ $item->deskripsi }}"
                                data-url="{{ $item->file }}">Edit</button>
                            <form action="{{ route('admin.dokumentasi.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
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
            <div class="mb-3">
                <label for="kegiatan_id" class="form-label">Pilih Kegiatan</label>
                <select name="kegiatan_id" class="form-select" id="kegiatan_id" required>
                    <option value="">Pilih Kegiatan</option>
                    @foreach (\App\Models\Kegiatan::all() as $kegiatan)
                        <option value="{{ $kegiatan->id }}">{{ $kegiatan->judul }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success" id="btn-submit">Simpan</button>
            <button type="button" class="btn btn-secondary" id="btn-cancel">Batal</button>
        </form>
    </div>
</div>

<script>
    // Tampilkan form tambah
    document.getElementById('btn-tambah').addEventListener('click', function() {
        var form = document.getElementById('form-tambah');
        document.getElementById('dokumentasi-form').reset();
        document.getElementById('dokumentasi-form').action = "{{ route('admin.dokumentasi.store') }}";
        document.getElementById('form-method').value = "POST";
        form.style.display = 'block';
        document.getElementById('nama_kegiatan').focus();
    });

    // Tampilkan form edit dan isi data
    document.querySelectorAll('.btn-edit').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var form = document.getElementById('form-tambah');
            form.style.display = 'block';
            document.getElementById('dokumentasi_id').value = this.dataset.id;
            document.getElementById('nama_kegiatan').value = this.dataset.nama;
            document.getElementById('deskripsi').value = this.dataset.deskripsi;
            document.getElementById('url').value = this.dataset.url;
            document.getElementById('dokumentasi-form').action = "/admin/dokumentasi/" + this.dataset
                .id;
            document.getElementById('form-method').value = "PUT";
            document.getElementById('nama_kegiatan').focus();
        });
    });

    // Tombol batal
    document.getElementById('btn-cancel').addEventListener('click', function() {
        document.getElementById('form-tambah').style.display = 'none';
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
