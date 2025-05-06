@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-primary mb-4">Kelola Sertifikat</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sertifikat A</td>
                <td>Disetujui</td>
                <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
            </tr>
            <tr>
                <td>Sertifikat B</td>
                <td>Ditolak</td>
                <td><a href="#" class="btn btn-sm btn-warning">Edit</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
