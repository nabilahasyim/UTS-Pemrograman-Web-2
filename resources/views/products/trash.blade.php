<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#fff0f5;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#ff85a2;">

        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="#">
                Bilsky Beauty Lounge
            </a>

            <div class="navbar-nav ms-auto">

                <a class="nav-link text-white" href="{{ route('products.index') }}">
                    Product
                </a>

                <a class="nav-link text-white" href="{{ route('products.trash') }}">
                    Trash
                </a>

            </div>

        </div>

    </nav>

    <div class="container mt-5">

        <h1 class="fw-bold mb-4" style="color:#ff85a2;">
            Trash Product
        </h1>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">
            Kembali
        </a>

        <table class="table table-bordered bg-white">

            <thead style="background-color:#ffd6e0;">

                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($products as $product)
                    <tr>

                        <td>{{ $products->firstItem() + $loop->index }}</td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->brand }}</td>

                        <td>{{ $product->deleted_at }}</td>

                        <td>

                            <form action="{{ route('products.restore', $product->id) }}" method="POST"
                                class="d-inline">

                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-success btn-sm">
                                    Restore
                                </button>

                            </form>

                            <form action="{{ route('products.forceDelete', $product->id) }}" method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Force Delete
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

        <div class="mt-3">
            {{ $products->links() }}
        </div>

    </div>

</body>

</html>
