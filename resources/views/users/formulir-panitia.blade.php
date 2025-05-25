@extends('template.template_user')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Kepanitiaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
        }

        .form-container {
            margin-left: 500px;
            margin-right: 300px;
            margin-top: 20px;
            border-radius: 12px;
        }

        .form-container::before {
            /* content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2); */
        }

        .form-title {
            color: #293A80;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: left;
            line-height: 1.2;
        }

        .form-subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 35px;
            line-height: 1.4;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #293A80;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            background-color: #d9d9d9;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #4a5bcc;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(74, 91, 204, 0.1);
            transform: translateY(-1px);
        }

        .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            background-color: #f8f9fa;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-select:focus {
            border-color: #4a5bcc;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(74, 91, 204, 0.1);
            transform: translateY(-1px);
        }

        .submit-btn {
            background: linear-gradient(135deg, #4a5bcc 0%, #667eea 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 25px rgba(74, 91, 204, 0.3);
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(74, 91, 204, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 30px 20px;
                margin: 10px;
            }

            .form-title {
                font-size: 24px;
            }
        }

        .success-message {
            display: none;
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            font-weight: 600;
        }

        .error-message {
            display: none;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            font-weight: 600;
        }

        .registratuonForm {}
    </style>
</head>

<body>
    <div class="form-container">
        <h1 class="form-title">Formulir Pendaftaran Kepanitiaan</h1>
        <p class="form-subtitle">Silakan isi formulir di bawah ini untuk mendaftarkan diri sebagai panitia kegiatan yang
            kamu minati.</p>

        <form method="POST" action="{{ route('users.daftar-panitia.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-input"
                    value="{{ isset($user) ? $user->nama ?? $user->name : Auth::user()->nama ?? (Auth::user()->name ?? '') }}"
                    readonly required>
            </div>

            <div class="form-group">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" id="npm" name="npm" class="form-input" required
                    value="{{ isset($user) ? $user->nim : '' }}" readonly>
            </div>

            <div class="form-group">
                <label for="no_wa" class="form-label">No. WA</label>
                <input type="text" id="no_wa" name="no_wa" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="divisi" class="form-label">Divisi</label>
                <select id="divisi" name="divisi" class="form-select" required>
                    <option value="">Divisi</option>
                    <option value="dph">DPH</option>
                    <option value="ppm">PPM</option>
                    <option value="kominkraf">KOMINKRAF</option>
                    <option value="pkm">PKM</option>
                    <option value="mba">MBA</option>
                    <option value="sosmas">SOSMAS</option>
                    <option value="hual">HUAL</option>
                    <option value="keagamaan">KEAGAMAAN</option>
                    <option value="adm">ADM</option>
                    <option value="none">Tidak ada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="">Pilih Role</option>
                    <option value="ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="bendahara">Bendahara</option>
                    <option value="anggota">anggota</option>
                </select>
            </div>

            <div class="form-group">
                <label for="panitia" class="form-label">Panitia yang ingin di ikuti</label>
                <select id="panitia" name="panitia" class="form-select" required>
                    <option value="">Panitia</option>
                    <option value="acara">panitia Acara</option>
                    <option value="konsumsi">panitia Konsumsi</option>
                    <option value="dokumentasi">panitia Dokumentasi</option>
                    <option value="publikasi">panitia Publikasi</option>
                    <option value="keamanan">panitia Keamanan</option>
                    <option value="perlengkapan">panitia Perlengkapan</option>
                    <option value="sponsorship">panitia Sponsorship</option>
                    <option value="transportasi">panitia Transportasi</option>
                </select>
            </div>

            <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

            <button type="submit" class="submit-btn">KIRIM</button>
        </form>
        <div id="successMessage" class="success-message">
            Pendaftaran berhasil! Terima kasih telah mendaftar sebagai panitia.
        </div>

        <div id="errorMessage" class="error-message">
            Mohon lengkapi semua field yang diperlukan.
        </div>
    </div>

    <!-- Hapus atau komen script ini -->
    <script>
        // Add input animation effects
        document.querySelectorAll('.form-input, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Format NPM input (only numbers)
        document.getElementById('npm').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
</body>

</html>
