@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan')

@section('content')
    <div class="container">
        <h1 class="page-title">Dokumentasi Kegiatan</h1>

        @if($dokumentasi->isEmpty())
            <p>Tidak ada dokumentasi yang tersedia saat ini.</p>
        @else
            <div class="list-group">
                @foreach($dokumentasi as $doc)
                    <div class="list-group-item">
                        <h3>{{ $doc->judul }}</h3>
                        <p>{{ $doc->deskripsi }}</p>
                        <a href="{{ $doc->link }}" target="_blank" class="btn btn-warning">Lihat Dokumentasi</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
