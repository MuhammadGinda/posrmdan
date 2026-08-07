<style>
    .produk-form-page label {
        color: #33395c;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }

    .produk-form-page .form-control {
        border: 1px solid #e1e4f7;
        border-radius: 8px;
        padding: 0.55rem 0.9rem;
    }
    .produk-form-page .form-control:focus {
        border-color: #4f5fe8;
        box-shadow: 0 0 0 0.2rem rgba(79, 95, 232, 0.15);
    }
    .produk-form-page .form-control.is-invalid {
        border-color: #e5484d;
    }

    .produk-form-page .invalid-feedback {
        color: #e5484d;
    }

    .produk-form-page .img-thumbnail {
        border-color: #e1e4f7;
        border-radius: 8px;
    }

    .produk-form-page .row > div {
        margin-bottom: 1rem;
    }

    .produk-form-page .btn-success {
        background: linear-gradient(90deg, #4f5fe8, #17b6a7);
        border: none;
        font-weight: 600;
        padding: 0.5rem 1.4rem;
        border-radius: 8px;
    }
    .produk-form-page .btn-success:hover {
        filter: brightness(0.95);
    }

    .produk-form-page .btn-secondary {
        background-color: #eef0fd;
        border: 1px solid #e1e4f7;
        color: #4f5fe8;
        font-weight: 600;
        padding: 0.5rem 1.4rem;
        border-radius: 8px;
    }
    .produk-form-page .btn-secondary:hover {
        background-color: #e1e4f7;
        color: #33395c;
    }
</style>

@csrf

@if (!empty($produk->foto))
    <div class="mb-2">
        <label>Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $produk->foto) }}" width="150" class="img-thumbnail">
    </div>
@endif

<div class="row">
    <div class="col">
        <div>
            <label>Gambar</label>
            <input type="file" name="foto" onchange="previewImage(this)"
                class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-2">
            <label>Preview foto</label><br>
            <img id="preview" class="img-thumbnail mt-2" style="display:none" width="150">
        </div>
    </div>
    <div>
        <label>Nama Produk</label><br>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $produk->nama ?? '') }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label>Harga Beli</label><br>
        <input type="number" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
        @error('purchase_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label>Harga Jual</label><br>
        <input type="number" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror"
            value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
        @error('selling_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label>Stok</label><br>
        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $produk->stok ?? '') }}">
        @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-success">
        Simpan
    </button>

    <a href="{{ route('produk.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>

</div>
</div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        }
    </script>