<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Skincare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffeef4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white rounded-top-4" style="background-color: #ff4f81;">
                <h3 class="mb-0">Tambah Kategori Skincare</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>

                        <input type="text" name="name" class="form-control rounded-3"
                            placeholder="Masukkan kategori skincare">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>

                        <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Masukkan deskripsi"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-control rounded-3">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                    </div>

                    <button type="submit" class="btn text-white rounded-3" style="background-color: #ff4f81;">
                        Simpan
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary rounded-3">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
