@extends('template.template')

<div class="title-kegiatan">
    <h1>Daftar Kegiatan</h1>
</div>

<!-- Tombol untuk menampilkan form -->
<button id="showFormButton" class="tambah-kegiatan">+ Tambah Kegiatan</button>

<!-- Form tambah kegiatan (disembunyikan secara default) -->
<div class="kotak" id="formTambahKegiatan" style="display: none; margin-top: 20px;">
    <form action="{{ route('admin.kegiatan.store') }}" method="POST">
        @csrf
        <input class="isi" type="text" name="judul" placeholder="Judul Kegiatan" required>
        <textarea class="isi" name="deskripsi" placeholder="Deskripsi Kegiatan" required></textarea>
        <button type="submit" class="btn-simpan">Simpan</button>
    </form>
</div>

<div class="kegiatan">
    @foreach ($kegiatan as $item)
        <div class="kotak">
            <div class="macam-kegiatan">
                <div class="header-kegiatan">
                    <h2>{{ $item->judul }}</h2>
                    <form action="{{ route('admin.kegiatan.update', $item->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button class="edit-btn">
                            <i class="fas fa-pen"></i> Edit
                        </button>
                    </form>
                </div>
                <p>{{ $item->deskripsi }}</p>
            </div>
        </div>
    @endforeach
</div>


<div id="editModal" style="display: none;" class="kotak">
    <form id="editForm" action="" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="judul" id="editJudul" placeholder="Judul Kegiatan" required>
        <textarea name="deskripsi" id="editDeskripsi" placeholder="Deskripsi Kegiatan" required></textarea>
        <button type="submit" class="btn-simpan">Simpan Perubahan</button>
    </form>
</div>

<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const kegiatanId = this.closest('form').action.split('/').pop();
            const judul = this.closest('.header-kegiatan').querySelector('h2').textContent;
            const deskripsi = this.closest('.macam-kegiatan').querySelector('p').textContent;

            document.getElementById('editForm').action = `/admin/kegiatan/${kegiatanId}`;
            document.getElementById('editJudul').value = judul;
            document.getElementById('editDeskripsi').value = deskripsi;

            document.getElementById('editModal').style.display = 'block';
        });
    });
</script>
