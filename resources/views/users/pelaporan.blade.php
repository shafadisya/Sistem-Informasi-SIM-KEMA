@extends('template.template_user')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    body {
        display: flex;
        background-color: #f5f5f5;
    }



    /* Main Content Styles */
    .main-content {
        flex: 1;
        padding: 0px;
        overflow-y: auto;
    }

    .page-title {
        margin-left: 280px;
        padding: 20px;
        /* text-align: center; */
        color: #29447c;
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .report-box {
        margin-left: 280px;
        margin-right: 10px;
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

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .btn-danger {
        background-color: #b22222;
        color: white;
    }

    .btn-danger:hover {
        background-color: #8b0000;
    }

    /* Report History Styles */
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
        margin-left: 20px
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

    .report-actions {
        display: flex;
        justify-content: flex-end;
        padding: 10px 15px;
        background-color: #f8f9fa;
    }

    .action-btn {
        padding: 5px 12px;
        font-size: 14px;
        border-radius: 4px;
        margin-left: 10px;
        cursor: pointer;
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

<div class="main-content">
    <h1 class="page-title">PELAPORAN</h1>

    <div class="report-box">
        <p>Apabila terdapat kesalahan silahkan ketik di bawah ini:</p>

        <form action="{{ route('users.pelaporan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="isi" class="form-control" placeholder="Ketik disini untuk melaporkan" rows="3" required></textarea>
            </div>

            <div class="form-group" style="display: flex; justify-content: center; margin-top: 20px; margin-bottom: 0;">
                <button type="submit" class="btn btn-danger">KIRIM LAPORAN</button>
            </div>
        </form>
    </div>

    <!-- Report History Section -->
    <div class="report-box">
        <h2 class="history-title">RIWAYAT PELAPORAN</h2>

        <div class="tabs">
            <div class="tab active" data-status="all">Semua</div>
            <div class="tab" data-status="waiting">Menunggu</div>
            <div class="tab" data-status="processing">Diproses</div>
            <div class="tab" data-status="resolved">Selesai</div>
        </div>

        <div id="report-list">
            <!-- Report Item 1 -->
            @foreach ($pelaporans as $item)
                <div class="report-item" data-status="{{ $item->status }}">
                    <div class="report-header" onclick="toggleReport(this)">
                        <div style="display: flex; align-items: center;">
                            <h3>{{ $item->isi }}</h3>
                            <span class="report-date">{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        <span class="report-status status-{{ $item->status }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <div class="report-content" style="display: none;">
                        <div class="report-message">
                            <p>{{ $item->isi }}</p>
                        </div>
                        <div class="admin-feedback">
                            @if ($item->balasan)
                                <p><span class="admin-name">Admin</span> <span
                                        class="admin-date">{{ $item->updated_at->format('d M Y, H:i') }}</span></p>
                                <p>{{ $item->balasan }}</p>
                            @else
                                <p>Belum ada tanggapan dari admin.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // Toggle report details
    function toggleReport(element) {
        const content = element.nextElementSibling;
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
    }

    // Handle tab filtering
    const tabs = document.querySelectorAll('.tab');
    const reportItems = document.querySelectorAll('.report-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            this.classList.add('active');

            // Filter reports
            const status = this.getAttribute('data-status');

            reportItems.forEach(item => {
                if (status === 'all' || item.getAttribute('data-status') === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Handle report submission
    document.getElementById('kirim-laporan').addEventListener('click', function() {
        const laporanText = document.getElementById('laporan-text').value;

        if (laporanText.trim() === '') {
            alert('Silakan isi laporan terlebih dahulu!');
            return;
        }

        // Create a new report item
        const reportList = document.getElementById('report-list');
        const today = new Date();
        const dateFormatted =
            `${today.getDate()} ${['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'][today.getMonth()]} ${today.getFullYear()}`;

        const newReport = document.createElement('div');
        newReport.className = 'report-item';
        newReport.setAttribute('data-status', 'waiting');

        newReport.innerHTML = `
                <div class="report-header" onclick="toggleReport(this)">
                    <div style="display: flex; align-items: center;">
                        <h3>Laporan Baru</h3>
                        <span class="report-date">${dateFormatted}</span>
                    </div>
                    <span class="report-status status-waiting">Menunggu</span>
                </div>
                <div class="report-content" style="display: none;">
                    <div class="report-message">
                        <p>${laporanText}</p>
                    </div>
                    <div class="admin-feedback">
                        <p>Belum ada tanggapan dari admin.</p>
                    </div>
                </div>
            `;

        // Insert new report at the top of the list
        reportList.insertBefore(newReport, reportList.firstChild);

        // Clear the textarea
        document.getElementById('laporan-text').value = '';

        alert('Laporan berhasil dikirim!');
    });
</script>
