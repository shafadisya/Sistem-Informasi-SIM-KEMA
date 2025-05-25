@extends('template.template_user')
@php
    // Contoh logika status, ganti sesuai kebutuhan
    // Misal: $status = 'diterima'; // atau 'ditolak', atau 'pending'
    use App\Models\PendaftaranPanitia;
    use Illuminate\Support\Facades\Auth;
@endphp
<!-- Main Content -->
<div class="content-wrapper">
    <h1 class="page-title">Daftar Kegiatan</h1>
</div>

@if (session('status_panitia'))
    <div class="alert" style="background:#f5f5f5; color:#333; border-radius:8px; padding:12px; margin-bottom:16px;">
        {{ session('status_panitia') }}
    </div>
@endif

<div class="kegiatan">
    @foreach ($kegiatan as $item)
        <div class="kotak">
            <div class="macam-kegiatan">
                <div class="header-kegiatan">
                    <h2>{{ $item->judul }}</h2>
                    <a href="{{ route('users.formulir-panitia', ['id' => $item->id]) }}" class="edit-daftar-panitia">
                        Daftar Panitia
                    </a>
                </div>
                <p>{{ $item->deskripsi }}</p>
                @php
                    $pendaftaran = \App\Models\PendaftaranPanitia::where('user_id', Auth::id())
                        ->where('kegiatan_id', $item->id)
                        ->first();
                    $status = $pendaftaran ? $pendaftaran->status : 'pending';
                @endphp
                <span>
                    @if ($status == 'diterima')
                        <span style="color:green;font-weight:bold;">Diterima</span>
                    @elseif($status == 'ditolak')
                        <span style="color:red;font-weight:bold;">Ditolak</span>
                    @else
                        <span style="color:gray;">Belum Daftar</span>
                    @endif
                </span>
            </div>
        </div>
    @endforeach
</div>
