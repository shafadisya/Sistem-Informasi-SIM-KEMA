@extends('layouts.app')

@section('title', 'Pelaporan Kegiatan')

@section('content')
    <div class="container">
        <h1 class="page-title">Pelaporan Kegiatan</h1>

        @if($pelaporan->isEmpty())
            <p>Tidak ada laporan yang tersedia saat ini.</p>
        @else
            <div class="list-group">
                @foreach($pelaporan as $report)
                    <div class="list-group-item">
                        <h3>{{ $report->judul }}</h3>
                        <p>{{ $report->deskripsi }}</p>
                        <a href="{{ $report->link_grup }}" target="_blank" class="btn btn-info">Lihat Grup WhatsApp</a>
                        <a href="{{ $report->link_laporan }}" target="_blank" class="btn btn-primary">Lihat Laporan</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
