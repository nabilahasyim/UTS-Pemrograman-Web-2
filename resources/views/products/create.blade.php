<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffeef4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white rounded-top-4" style="background-color: #ff4f81;">
                <h3 class="mb-0">Tambah Product Skincare</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>

                        <select name="category_id" class="form-control">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Product</label>

                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama product">
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>

                        <input type="number" name="price" class="form-control" placeholder="Masukkan harga">
                    </div>

                    <div class="mb-3">
                        <label>Stock</label>

                        <input type="number" name="stock" class="form-control" placeholder="Masukkan stock">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>

                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                    </div>

                    <button type="submit" class="btn text-white" style="background-color: #ff4f81;">
                        Simpan
                    </button>

                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
