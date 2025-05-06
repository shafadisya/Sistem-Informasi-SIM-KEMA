@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold text-primary mb-4">Admin Dashboard</h2>

        <div class="row">
            <!-- Panel Kegiatan -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kegiatan</h5>
                        <p class="card-text">Kelola kegiatan di sini.</p>
                        <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-primary">Kelola Kegiatan</a>
                    </div>
                </div>
            </div>

            <!-- Panel Panitia -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Panitia</h5>
                        <p class="card-text">Kelola pendaftaran panitia.</p>
                        <a href="{{ route('admin.panitia.index') }}" class="btn btn-primary">Kelola Panitia</a>
                    </div>
                </div>
            </div>

            <!-- Panel Sertifikat -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sertifikat</h5>
                        <p class="card-text">Kelola sertifikat untuk panitia.</p>
                        <a href="{{ route('admin.sertifikat.index') }}" class="btn btn-primary">Kelola Sertifikat</a>
                    </div>
                </div>
            </div>

            <!-- Panel Dokumentasi -->
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dokumentasi</h5>
                        <p class="card-text">Lihat dan unggah dokumentasi acara.</p>
                        <a href="{{ route('admin.dokumentasi.index') }}" class="btn btn-primary">Kelola Dokumentasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
