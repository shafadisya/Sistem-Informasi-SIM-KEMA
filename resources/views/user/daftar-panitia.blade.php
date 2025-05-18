
@extends('template.template-user')

<div class="main-content">
    <div class="header">
        <h1>Daftar Kepanitiaan</h1>
        <p>Pilih kegiatan apa yang ingin kamu ikuti:</p>
    </div>

    <div class="kegiatan-list">
        @foreach($kegiatan as $item)
            <div class="kegiatan-item">
                <h2>{{ $item->judul }}</h2>
                <a href="{{ url('user/formulir-panitia?kegiatan='.$item->id) }}" class="add-btn">+</a>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('.add-btn:not([disabled])').forEach(button => {
        button.addEventListener('click', function() {
            const kegiatan = this.getAttribute('data-kegiatan');
            window.location.href = `formulir-panitia.html?kegiatan=${encodeURIComponent(kegiatan)}`;
        });
    });
</script>
