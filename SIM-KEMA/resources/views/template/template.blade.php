<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-KEMA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="logo.png" alt="HMIF">
            <span>SIM-KEMA</span>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('dashboard-admin') }}" class="active">
                    <i class="fas fa-home text-primary"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('daftar-panitia-admin') }}">
                    <i class="fas fa-users text-primary"></i> Kelola Daftar Panitia
                </a>
            </li>
            <li>
                <a href="{{ url('sertifikat-admin') }}">
                    <i class="fas fa-certificate text-primary"></i> Kelola Sertifikat
                </a>
            </li>
            <li>
                <a href="{{ url('dokumentasi-admin') }}">
                    <i class=" fas fa-images text-primary"></i> Kelola Dokumentasi
                </a>
            </li>
            <li>
                <a href="{{ url('pelaporan-admin') }}">
                    <i class="fas fa-info-circle text-primary"></i> Kelola Pelaporan
                </a>
            </li>
        </ul>
    </div>
</body>

</html>
