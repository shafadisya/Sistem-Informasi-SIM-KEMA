<div class="table-container">
    <table class="table-container">
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>File</th>
                <th>Tanggal Terbit</th>
                @if ($isAdmin ?? false)
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($sertifikat as $item)
                <tr>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td><a href="{{ $item->file }}" target="_blank">Lihat File</a></td>
                    <td>{{ $item->tanggal_terbit }}</td>
                    @if ($isAdmin ?? false)
                        <td>
                            <form action="{{ route('admin.sertifikat.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                            <button class="btn btn-primary" onclick="toggleEditForm({{ $item->id }})">Edit</button>
                            <!-- Form Edit Sertifikat -->
                            <div id="form-edit-sertifikat-{{ $item->id }}" style="display: none;" class="kotak">
                                <form action="{{ route('admin.sertifikat.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nama_kegiatan" value="{{ $item->nama_kegiatan }}"
                                        required>
                                    <input type="url" name="file" value="{{ $item->file }}" required>
                                    <input type="date" name="tanggal_terbit" value="{{ $item->tanggal_terbit }}"
                                        required>
                                    <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
