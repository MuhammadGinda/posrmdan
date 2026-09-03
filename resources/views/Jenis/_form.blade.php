<div class="mb-3">
    <label class="form-label">Nama Jenis</label>
    <input type="text" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror"
        value="{{ old('nama_jenis', $jenis->nama_jenis ?? '') }}" required>
    @error('nama_jenis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2 mt-4">
    <button class="btn btn-simpan" type="submit">Simpan</button>
    <a href="{{ route('jenis.index') }}" class="btn btn-kembali">Kembali</a>
</div>