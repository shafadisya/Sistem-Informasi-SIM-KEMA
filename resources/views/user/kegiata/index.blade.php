@extends('layouts.app')

@section('title', 'Daftar Kegiatan')

@section('content')
    <div class="container">
        <h1 class="page-title">Daftar Kegiatan</h1>
        
        @if($kegiatan->isEmpty())
            <p>Tidak ada kegiatan yang tersedia saat ini.</p>
        @else
            <div class="list-group">
                @foreach($kegiatan as $event)
                    <div class="list-group-item">
                        <h3>{{ $event->nama }}</h3>
                        <p>{{ $event->deskripsi }}</p>
                        <p><strong>Mulai:</strong> {{ $event->tanggal_mulai }} | <strong>Selesai:</strong> {{ $event->tanggal_selesai }}</p>
                        <a href="{{ route('formulir.pendaftaran', $event->id) }}" class="btn btn-primary">Daftar Sekarang</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
