@extends('template.template_user')

<div class="content-wrapper">
    <h1 class="page-title">Daftar Panitia</h1>
    <p style="color: gray">Pilih kegiatan apa yang ingin kamu ikuti:</p>
</div>

@if (session('success'))
    <div class="alert alert-success kotak">
        {{ session('success') }}
    </div>
@endif

<div class="kegiatan">
    @foreach ($kegiatan as $item)
        <div class="kotak">
            <div class="macam-kegiatan">
                <div class="header-kegiatan">
                    <h2>{{ $item->judul }}</h2>
                    <form action="{{ route('admin.kegiatan.update', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button class="edit-daftar-panitia">
                            <a href="{{ route('users.formulir-panitia', ['id' => $item->id]) }}?nama={{ urlencode($item->judul) }}"
                                class="edit-daftar-panitia">+</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
