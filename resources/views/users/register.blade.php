<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Daftar</h2>
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">DAFTAR</button>
            <p>Sudah punya akun? <a href="{{ route('users.login') }}">Login di sini</a></p>
        </form>
    </div>
</body>
</html>