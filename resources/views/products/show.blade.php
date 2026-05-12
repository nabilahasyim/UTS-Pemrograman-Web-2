<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #ffeef4;">

    <div class="container mt-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header text-white rounded-top-4" style="background-color: #ff4f81;">
                <h3 class="mb-0">Detail Product Skincare</h3>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <h5>Nama Product</h5>
                    <p>{{ $product->name }}</p>
                </div>

                <div class="mb-3">
                    <h5>Kategori</h5>
                    <p>{{ $product->category->name }}</p>
                </div>

                <div class="mb-3">
                    <h5>Status</h5>

                    <span class="badge" style="background-color: #ff4f81;">
                        {{ $product->status }}
                    </span>
                </div>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</body>

</html>
