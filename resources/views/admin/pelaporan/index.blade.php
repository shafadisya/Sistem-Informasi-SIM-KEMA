@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-danger mb-4">Pelaporan</h2>
    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <label for="laporan" class="form-label">Laporan</label>
            <textarea class="form-control" id="laporan" name="laporan" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Kirim Laporan</button>
    </form>
</div>
@endsection
