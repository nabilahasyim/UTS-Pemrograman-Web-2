<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffeef4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white rounded-top-4" style="background-color: #ff4f81;">
                <h3 class="mb-0">Data Product Skincare</h3>
            </div>

            <div class="card-body">

                <form action="" method="GET" class="mb-4 d-flex">

                    <input type="text" name="search" class="form-control me-2 rounded-3"
                        placeholder="Cari product skincare...">

                    <button type="submit" class="btn text-white rounded-3" style="background-color: #ff4f81;">
                        Cari
                    </button>

                </form>

                <a href="{{ route('products.create') }}" class="btn text-white mb-3 rounded-3"
                    style="background-color: #ff85a2;">
                    + Tambah Product
                </a>

                <table class="table table-bordered table-hover align-middle">

                    <thead class="text-white" style="background-color: #ff4f81;">
                        <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $product->name }}</td>

                                <td>{{ $product->category->name }}</td>

                                <td>
                                    <span class="badge" style="background-color: #ff85a2;">
                                        {{ $product->status }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $products->links() }}
                </div>

            </div>

        </div>

    </div>

</body>

</html>
