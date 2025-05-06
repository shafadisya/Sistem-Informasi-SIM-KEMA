@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-primary mb-4">Daftar Kegiatan</h2>
    <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary mb-3 float-end">+ Tambah Kegiatan</a>

    @foreach($kegiatan as $item)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="text-uppercase text-primary fw-bold">{{ $item->nama }}</h4>
                <a href="{{ route('admin.kegiatan.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            </div>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
            <form action="{{ route('admin.kegiatan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">Hapus</button>
            </form>
            <span class="ms-2 badge rounded-pill 
                @if($item->status === 'accepted') bg-success 
                @elseif($item->status === 'rejected') bg-danger 
                @else bg-secondary @endif">
                {{ $item->status }}
            </span>
        </div>
    </div>
    @endforeach
</div>
@endsection
