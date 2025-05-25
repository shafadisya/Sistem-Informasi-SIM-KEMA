
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('login-register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <div class="logo">
                <img src="{{ asset('logo.png') }}" alt="Logo SIM-KEMA">
                <h1>SIM KEMA</h1>
                <p>Silakan daftar untuk membuat akun</p>
            </div>
            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom:1rem;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('users.register') }}">
                @csrf
                <div class="input-group">
                    <label for="nim">NIM</label>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nim" name="nim" placeholder="NIM" value="{{ old('nim') }}" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="name">Nama Lengkap</label>
                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>
                </div>
                <button type="submit" class="btn-login">DAFTAR</button>
                <div class="login-option">
                    Sudah punya akun? <a href="{{ url('login') }}">Login</a>
                </div>
            </form>
        </div>
        <div class="login-image">
            <img src="{{ asset('fotohmif.jpg') }}" alt="Register Image">
            <div class="overlay">
                <h2>Selamat Datang di SIM KEMA</h2>
                <p>Manajemen Kegiatan Mahasiswa Informatika</p>
            </div>
        </div>
    </div>
</body>

</html>