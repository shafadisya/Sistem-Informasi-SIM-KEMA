<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('style-user.css') }}">
</head>

<body>
    <div class="form-container">
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <h2>Login</h2>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOGIN</button>
            <p>Belum punya akun? <a href="{{ url('register') }}">Daftar</a></p>
        </form>
    </div>
</body>

</html>
