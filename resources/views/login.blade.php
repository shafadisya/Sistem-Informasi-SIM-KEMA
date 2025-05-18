<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="logo">
                <img src="{{ asset('logo.png') }}" alt="Logo SIM-KEMA">
                <h1>SIM KEMA</h1>
                <p>Silakan login untuk melanjutkan</p>
            </div>
            {{-- Error message --}}
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom:1rem;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div class="input-group">
                    <label for="nim">NIM</label>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nim" name="nim" placeholder="NIM" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn-login">LOGIN</button>
                <div class="login-option">
                    Belum punya akun? <a href="{{ url('register') }}">Daftar</a>
                </div>
            </form>
        </div>
        <div class="login-image">
            <img src="{{ asset('fotohmif.jpg') }}" alt="Login Image">
            <div class="overlay">
                <h2>Selamat Datang di SIM KEMA</h2>
                <p>Manajemen Kegiatan Mahasiswa Informatika</p>
            </div>
        </div>
    </div>
</body>
</html>