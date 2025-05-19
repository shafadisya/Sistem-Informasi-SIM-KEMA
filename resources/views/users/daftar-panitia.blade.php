@extends('template.template_user') {{-- Ganti jika pakai layout user --}}

@section('content')
<div class="main-content">
    <div class="header">
        <h1>Daftar Kepanitiaan</h1>
        <p>Pilih kegiatan apa yang ingin kamu ikuti:</p>
    </div>

    <div class="kegiatan-list">

        <div class="kegiatan-item">
            <h2>INFEST</h2>
            <button class="add-btn" data-kegiatan="INFEST">+</button>
        </div>

        <div class="kegiatan-item">
            <h2>POINT</h2>
            <button class="add-btn" data-kegiatan="POINT">+</button>
        </div>

        <div class="kegiatan-item disabled">
            <h2>DETIK</h2>
            <span class="coming-soon">COMING SOON...</span>
            <button class="add-btn" disabled>+</button>
        </div>

        <div class="kegiatan-item disabled">
            <h2>PAKARMARU</h2>
            <span class="coming-soon">COMING SOON...</span>
            <button class="add-btn" disabled>+</button>
        </div>

        <div class="kegiatan-item disabled">
            <h2>MUBES</h2>
            <span class="coming-soon">COMING SOON...</span>
            <button class="add-btn" disabled>+</button>
        </div>

        <div class="kegiatan-item disabled">
            <h2>MONEV</h2>
            <span class="coming-soon">COMING SOON...</span>
            <button class="add-btn" disabled>+</button>
        </div>

    </div>
</div>

<script>
    document.querySelectorAll('.add-btn:not([disabled])').forEach(button => {
        button.addEventListener('click', function () {
            const kegiatan = this.getAttribute('data-kegiatan');
            window.location.href = `/formulir-panitia?kegiatan=${encodeURIComponent(kegiatan)}`;
        });
    });
</script>
@endsection
