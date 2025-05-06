@extends('layouts.app')

@section('title', 'Sertifikat Saya')

@section('content')
    <div class="container">
        <h1 class="page-title">Sertifikat Saya</h1>

        @if($sertifikat->isEmpty())
            <p>Belum ada sertifikat yang tersedia untuk Anda.</p>
        @else
            <div class="list-group">
                @foreach($sertifikat as $cert)
                    <div class="list-group-item">
                        <h4>{{ $cert->nama }}</h4>
                        <p>{{ $cert->deskripsi }}</p>
                        <a href="{{ route('user.sertifikat.download', $cert->id) }}" class="btn btn-info">Unduh Sertifikat</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
