@extends('template.template_user') 

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulir Pendaftaran Panitia</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* Styles sama seperti sebelumnya (dipersingkat di sini) */
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
    }

    .sidebar {
      width: 270px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background-color: #c8e0ef;
      padding-top: 20px;
    }

    .sidebar-logo {
      text-align: left;
      padding: 10px 20px;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
    }

    .sidebar-logo img {
      width: 50px;
      margin-right: 10px;
    }

    .sidebar-logo span {
      font-family: "Times New Roman", serif;
      font-style: italic;
      font-size: 24px;
      font-weight: bold;
      color: #29447c;
    }

    .sidebar-menu {
      list-style: none;
      padding: 0;
    }

    .sidebar-menu li a {
      display: flex;
      align-items: center;
      color: #29447c;
      padding: 15px 20px;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar-menu li a:hover,
    .sidebar-menu li a.active {
      background-color: #b9d9ee;
    }

    .sidebar-menu li a i {
      margin-right: 10px;
      font-size: 18px;
      color: #3498db;
    }

    .content-wrapper {
      margin-left: 270px;
      padding: 40px;
    }

    .form-container {
      max-width: 700px;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-size: 28px;
      font-family: "Times New Roman", serif;
      font-weight: bold;
      color: #29447c;
      margin-bottom: 10px;
    }

    .form-subtitle {
      font-style: italic;
      color: #666;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #29447c;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 6px;
      background-color: #dee2e6;
      font-size: 14px;
    }

    .btn-submit {
      background-color: #29447c;
      color: white;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #1e3460;
    }

    .success-message {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-logo">
      <img src="{{ asset('asset/logo.png') }}" alt="Logo" />
      <span>SIM-KEMA</span>
    </div>
    <ul class="sidebar-menu">
      <li><a href="/"><i class="fas fa-home"></i> Dashboard</a></li>
      <li><a class="active" href="#"><i class="fas fa-user-plus"></i> Daftar Panitia</a></li>
      <li><a href="#"><i class="fas fa-certificate"></i> Sertifikat</a></li>
      <li><a href="#"><i class="fas fa-image"></i> Dokumentasi</a></li>
      <li><a href="#"><i class="fas fa-info-circle"></i> Pelaporan</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="content-wrapper">
    <div class="form-container">
      <div class="form-title">Formulir Pendaftaran Kepanitiaan</div>
      <div class="form-subtitle">Silakan isi formulir di bawah ini untuk mendaftarkan diri sebagai panitia kegiatan yang kamu minati.</div>

      <!-- Success message -->
      @if(session('success'))
        <div class="success-message" id="success-msg">
          {{ session('success') }}
        </div>
        <script>
          setTimeout(() => {
            window.location.href = "https://chat.whatsapp.com/YOUR_GROUP_LINK";
          }, 2000);
        </script>
      @endif

      <!-- Form -->
      <form action="{{ route('panitia.store') }}" method="POST" id="form-panitia">
        @csrf

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>

        <label for="npm">NPM</label>
        <input type="text" id="npm" name="npm" value="{{ old('npm') }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="kegiatan">Kegiatan yang ingin diikuti</label>
        <input type="text" id="kegiatan" name="kegiatan" value="{{ old('kegiatan') }}" required>

        <label for="divisi">Divisi yang ingin diikuti</label>
        <select id="divisi" name="divisi" required>
          <option value="">Pilih Divisi</option>
          <option value="Acara" {{ old('divisi') == 'Acara' ? 'selected' : '' }}>Acara</option>
          <option value="Humas" {{ old('divisi') == 'Humas' ? 'selected' : '' }}>Humas</option>
          <option value="Perlengkapan" {{ old('divisi') == 'Perlengkapan' ? 'selected' : '' }}>Perlengkapan</option>
          <option value="Dekdok" {{ old('divisi') == 'Dekdok' ? 'selected' : '' }}>Dekdok</option>
          <option value="Konsumsi" {{ old('divisi') == 'Konsumsi' ? 'selected' : '' }}>Konsumsi</option>
        </select>

        <button type="submit" class="btn-submit">KIRIM</button>
      </form>
    </div>
  </div>
</body>
</html>
