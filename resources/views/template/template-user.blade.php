<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('style-user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('logo.png') }}" alt="Logo" />
                <span>SIM-KEMA</span>
            </div>
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="{{ url('user.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('user.daftar-panitia') }}"><i class="fas fa-users"></i> Daftar Panitia</a>
                </li>
                <li>
                    <a href="{{ url('user.sertifikat') }}"><i class="fas fa-certificate"></i> Sertifikat</a>
                </li>
                <li>
                    <a href="{{ url('user.dokumentasi') }}"><i class="fas fa-file-alt"></i> Dokumentasi</a>
                </li>
                <li>
                    <a href="{{ url('user.pelaporan') }}"><i class="fas fa-exclamation-circle"></i> Pelaporan</a>
                </li>
            </ul>
        </div>
</body>

</html>
