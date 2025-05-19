<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SIM-KEMA</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="{{ route('users.login') }}">
            @csrf
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOGIN</button>
            <p>Belum punya akun? <a href="{{ route('users.register') }}">Daftar</a></p>
        </form>
    </div>
</body>
</html>