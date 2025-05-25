@extends('template.template')
<div class="pelaporan-container">
    <h1 class="pelaporan-title">PELAPORAN</h1>
    <p class="pelaporan-subtitle">Apabila terdapat kesalahan akan terlihat di bawah ini:</p>

    <div class="laporan">
        @foreach ($pelaporans as $item)
            <div class="report-item" data-status="{{ $item->status }}">
                <div class="report-header" onclick="toggleReport(this)">
                    <div
                        style="display: flex; align-items: center; background-color: #f8f9fa; padding: 10px; border-radius: 5px;">
                        <h3>{{ $item->isi }}</h3>
                        <span class="report-date"
                            style="margin-left: 16px;">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <span class="report-nama" style="font-size: 14px; color: #888; margin-left: 4px;">
                        oleh: <b>{{ $item->nama }}</b>
                    </span>
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
                            <p>
                                <span class="admin-name">Admin</span>
                                <span class="admin-date"
                                    style="margin-left: 8px;">{{ $item->updated_at->format('d M Y, H:i') }}</span>
                            </p>
                            <p>{{ $item->balasan }}</p>
                        @endif
                        <form action="{{ route('admin.pelaporan.balas', $item->id) }}" method="POST"
                            style="margin-top: 10px;">
                            @csrf
                            <textarea name="balasan" required class="form-control" placeholder="Tulis balasan...">{{ $item->balasan }}</textarea>
                            <select name="status" required style="margin-top: 8px;">
                                <option value="waiting" {{ $item->status == 'waiting' ? 'selected' : '' }}>Waiting
                                </option>
                                <option value="processing" {{ $item->status == 'processing' ? 'selected' : '' }}>
                                    Diproses</option>
                                <option value="resolved" {{ $item->status == 'resolved' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                            <button type="submit" class="btn btn-primary" style="margin-top: 8px;">Kirim
                                Balasan</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="app.js"></script>
<script>
    function toggleReport(element) {
        const content = element.nextElementSibling;
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
    }
</script>
