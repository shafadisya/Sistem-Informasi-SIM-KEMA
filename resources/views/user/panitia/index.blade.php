@extends('layouts.app')

@section('title', 'Pendaftaran Panitia')

@section('content')
    <div class="container">
        <h1 class="page-title">Pendaftaran Panitia</h1>

        <p>Pilih kegiatan untuk mendaftar sebagai panitia:</p>

        @if($kegiatan->isEmpty())
            <p>Tidak ada kegiatan yang tersedia untuk pendaftaran panitia.</p>
        @else
            <div class="list-group">
                @foreach($kegiatan as $event)
                    <div class="list-group-item">
                        <h3>{{ $event->nama }}</h3>
                        <p>{{ $event->deskripsi }}</p>
                        <a href="{{ route('formulir.pendaftaran', $event->id) }}" class="btn btn-success">Pilih untuk Mendaftar</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
