<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('login-register.css') }}">
</head>

<body>
    <div class="form-container">
        <form method="POST" action="{{ url('register') }}">
            @csrf
            <h2>Daftar</h2>
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <select name="role" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">DAFTAR</button>
            <p>Sudah punya akun? <a href="{{ url('login') }}">Login di sini</a></p>
        </form>
    </div>
</body>

</html>
