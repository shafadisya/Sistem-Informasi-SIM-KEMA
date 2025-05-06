
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM-KEMA - @yield('title', 'Sistem Informasi Kemahasiswaan')</title>
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            width: 270px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #d6ebf6;  /* Light blue background */
            padding-top: 20px;
        }
        
        .sidebar-logo {
            text-align: center;
            padding: 10px 20px;
            margin-bottom: 30px;
        }
        
        .sidebar-logo img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        
        .sidebar-logo span {
            font-size: 24px;
            font-weight: bold;
            color: #29447c;  /* Dark blue color */
        }
        
        .sidebar-menu {
            padding: 0;
            list-style: none;
        }
        
        .sidebar-menu li {
            width: 100%;
        }
        
        .sidebar-menu li a {
            display: flex;
            align-items: center;
            color: #29447c;
            padding: 15px 20px;
            text-decoration: none;
            transition: 0.3s;
        }
        
        .sidebar-menu li a:hover, .sidebar-menu li a.active {
            background-color: #b9d9ee;
        }
        
        .sidebar-menu li a i {
            margin-right: 15px;
            font-size: 18px;
            color: #3498db;
        }
        
        .content-wrapper {
            margin-left: 270px;
            padding: 30px;
        }
        
        .page-title {
            color: #29447c;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .card-panel {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .event-card {
            background-color: #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }
        
        .event-title {
            color: #29447c;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .event-desc {
            color: #555;
            margin-bottom: 15px;
        }
        
        .btn-daftar {
            background-color: #29447c;
            color: white;
            padding: 8px 25px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            border: none;
            font-weight: 500;
        }
        
        .btn-daftar:hover {
            background-color: #1e3460;
            color: white;
        }
        
        .status-indicator {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }
        
        .status-dot {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .status-accepted {
            background-color: #28a745;
        }
        
        .status-rejected {
            background-color: #dc3545;
        }
        
        .status-none {
            background-color: #ffffff;
            border: 1px solid #ccc;
        }
        
        .status-text {
            font-style: italic;
        }
        
        .info-panel {
            background-color: #d1e4f3;
            border-radius: 8px;
            padding: 20px;
        }
        
        .link-panel {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            margin-top: 15px;
        }
        
        .add-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #29447c;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 24px;
        }
        
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        .form-label {
            color: #29447c;
            font-weight: 500;
        }
        
        .form-control {
            background-color: #e9ecef;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
        
        .btn-submit {
            background-color: #29447c;
            color: white;
            padding: 10px 30px;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset("images\logo.png") }}" alt="Logo SIM-KEMA">
            <span>SIM-KEMA</span>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home text-primary"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('daftar.panitia') }}" class="{{ request()->routeIs('daftar.panitia') ? 'active' : '' }}">
                    <i class="fas fa-users text-primary"></i> Daftar Panitia
                </a>
            </li>
            <li>
                <a href="{{ route('sertifikat') }}" class="{{ request()->routeIs('sertifikat') ? 'active' : '' }}">
                    <i class="fas fa-certificate text-primary"></i> Sertifikat
                </a>
            </li>
            <li>
                <a href="{{ route('dokumentasi') }}" class="{{ request()->routeIs('dokumentasi') ? 'active' : '' }}">
                    <i class="fas fa-images text-primary"></i> Dokumentasi
                </a>
            </li>
            <li>
                <a href="{{ route('pelaporan') }}" class="{{ request()->routeIs('pelaporan') ? 'active' : '' }}">
                    <i class="fas fa-info-circle text-primary"></i> Pelaporan
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>