<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Skincare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffeef4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white rounded-top-4" style="background-color: #ff4f81;">
                <h3 class="mb-0">Edit Kategori Skincare</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('categories.update', $category->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama Kategori</label>

                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>

                        <textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>

                        <select name="status" class="form-control">

                            <option value="Tersedia" {{ $category->status == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia
                            </option>

                            <option value="Kosong" {{ $category->status == 'Kosong' ? 'selected' : '' }}>
                                Kosong
                            </option>

                        </select>
                    </div>

                    <button type="submit" class="btn text-white" style="background-color: #ff4f81;">
                        Update
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
