
@extends('template.template-user')

<!-- Main Content -->
<div class="content-wrapper">
    <h1 class="page-title">Daftar Kegiatan</h1>

    @foreach($kegiatan as $item)
        <div class="event-card">
            <h2 class="event-title">{{ $item->judul }}</h2>
            <p class="event-desc">{{ $item->deskripsi }}</p>
            <!-- Tambahkan tombol/info lain jika perlu -->
        </div>
    @endforeach
</div>