<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
});

Route::get('/daftar-panitia-admin', function () {
    return view('admin.daftar-panitia');
});

Route::get('/sertifikat-admin', function () {
    return view('admin.sertifikat');
});

Route::get('/dokumentasi-admin', function () {
    return view('admin.dokumentasi');
});

Route::get('/pelaporan-admin', function () {
    return view('admin.pelaporan');
});
