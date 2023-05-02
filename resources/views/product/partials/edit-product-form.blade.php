<div class="container mt-4 mb-2 card">
    <h1>Edit Produk</h1>
    <hr>
    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Nama Produk (Max. 30)</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ $product->name }}" maxlength="30" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $product->location }}"
                maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                name="price" value="{{ $product->price }}" required>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category_id">
                @foreach ($categories as $category)
                    @if ($category == $product->category)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Gambar Saat Ini</label>
            <div class="mb-2">
                @if ($product->image)
                    <img src="{{ asset('storage/product_images/' . $product->image) }}" alt="{{ $product->name }}"
                        style="max-height: 200px">
                @else
                    <p>No image available</p>
                @endif
            </div>
            <label for="image">Ganti Gambar</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                    name="image">
                <label class="custom-file-label" for="image">Pilih Gambar</label>
            </div>
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi (Max.255)</label>
            <textarea class="form-control" id="description" name="description" rows="5" maxlength="255">{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2 mb-5">Simpan Perubahan</button>
    </form>
</div>