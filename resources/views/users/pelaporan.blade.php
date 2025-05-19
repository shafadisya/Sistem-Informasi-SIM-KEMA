@extends('template.template_user')

@section('style')
<style>
    .content-wrapper {
        padding: 40px;
    }

    .page-title {
        text-align: center;
        font-size: 32px;
        color: #b22222;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .report-box {
        background-color: #ffcccb;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .report-box p {
        margin-bottom: 15px;
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        background-color: #fff;
    }

    .btn-danger {
        background-color: #b22222;
        color: white;
        font-weight: bold;
    }

    .btn-danger:hover {
        background-color: #8b0000;
    }

    .report-history {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .history-title {
        color: #2c406e;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    .report-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .report-header {
        background-color: #f2f2f2;
        padding: 12px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        border-bottom: 1px solid #ddd;
    }

    .report-header h3 {
        font-size: 16px;
        font-weight: 500;
    }

    .report-date {
        font-size: 14px;
        color: #777;
    }

    .report-status {
        font-size: 14px;
        padding: 3px 10px;
        border-radius: 12px;
        font-weight: 500;
    }

    .status-waiting {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-resolved {
        background-color: #d4edda;
        color: #155724;
    }

    .status-processing {
        background-color: #cce5ff;
        color: #004085;
    }

    .report-content {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .report-message {
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .admin-feedback {
        background-color: #f8f9fa;
        padding: 12px;
        border-radius: 5px;
        margin-top: 10px;
    }

    .admin-feedback p {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .admin-name {
        font-weight: 500;
        color: #2c406e;
    }

    .admin-date {
        font-size: 12px;
        color: #777;
        margin-left: 10px;
    }

    .no-reports {
        text-align: center;
        padding: 30px;
        color: #777;
    }

    .tabs {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
    }

    .tab {
        padding: 10px 20px;
        cursor: pointer;
        font-weight: 500;
        color: #555;
        border-bottom: 3px solid transparent;
    }

    .tab.active {
        color: #2c406e;
        border-bottom: 3px solid #3498db;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="page-title">Pelaporan</div>

    <!-- Laporan Baru -->
    <div class="report-box">
        <p>Apabila terdapat kesalahan silahkan ketik di bawah ini:</p>
        <div class="form-group">
            <textarea id="laporan-text" class="form-control" placeholder="Ketik disini untuk melaporkan" rows="3"></textarea>
        </div>
        <div class="form-group" style="display: flex; justify-content: center; margin-top: 20px;">
            <button id="kirim-laporan" class="btn btn-danger">Kirim Laporan</button>
        </div>
    </div>

    <!-- Riwayat Laporan -->
    <div class="report-history">
        <h2 class="history-title">Riwayat Pelaporan</h2>
        <div class="tabs">
            <div class="tab active" data-status="all">Semua</div>
            <div class="tab" data-status="waiting">Menunggu</div>
            <div class="tab" data-status="processing">Diproses</div>
            <div class="tab" data-status="resolved">Selesai</div>
        </div>

        <div id="report-list">
            <!-- Contoh Laporan -->
            <div class="report-item" data-status="resolved">
                <div class="report-header" onclick="toggleReport(this)">
                    <div style="display: flex; align-items: center;">
                        <h3>Kesalahan pada nama di sertifikat</h3>
                        <span class="report-date">14 Mei 2025</span>
                    </div>
                    <span class="report-status status-resolved">Selesai</span>
                </div>
                <div class="report-content" style="display: none;">
                    <div class="report-message">
                        <p>Nama saya tertulis "Adinda Pramesti" seharusnya "Adinda Paramesti" di sertifikat kegiatan PKKMB 2025.</p>
                    </div>
                    <div class="admin-feedback">
                        <p><span class="admin-name">Admin Pusat</span> <span class="admin-date">15 Mei 2025, 10:23</span></p>
                        <p>Terima kasih atas laporannya. Sertifikat telah diperbaiki dan dapat diunduh kembali pada menu Sertifikat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleReport(element) {
        const content = element.nextElementSibling;
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
