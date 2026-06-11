<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color:#fff0f5;">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#ff85a2;">

        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="#">
                <img src="{{ asset('images/logo.png') }}" width="40" height="40" class="me-2 rounded-circle">
                Bilsky Beauty Lounge
            </a>

            <div class="navbar-nav ms-auto">

                <a class="nav-link text-white" href="{{ route('categories.index') }}">
                    Category
                </a>

                <a class="nav-link text-white" href="{{ route('products.index') }}">
                    Product
                </a>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <div class="container mt-5">

        <h1 class="fw-bold mb-4" style="color:#ff85a2;">
            Product Skincare
        </h1>

        <a href="{{ route('products.create') }}" class="btn text-white mb-3"
            style="background-color:#ff85a2; border:none;">
            + Add Product
        </a>

        <!-- SEARCH & FILTER -->
        <form action="{{ route('products.index') }}" method="GET" class="row mb-3">

            <div class="col-md-4">

                <input type="text" name="search" class="form-control" placeholder="Search product...">

            </div>

            <div class="col-md-4">

                <select name="category_id" class="form-control">

                    <option value="">
                        -- Filter Category --
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

            </div>

            <div class="col-md-2">

                <button type="submit" class="btn text-white" style="background-color:#ff85a2; border:none;">
                    Search
                </button>

            </div>

        </form>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table table-bordered bg-white">

                <thead style="background-color:#ffd6e0;">

                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($products as $item)
                        <tr>

                            <td>{{ $products->firstItem() + $loop->index }}</td>

                            <td>{{ $item->category->name }}</td>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->brand }}</td>

                            <td>
                                Rp {{ number_format($item->price) }}
                            </td>

                            <td>{{ $item->stock }}</td>

                            <td>{{ $item->description }}</td>

                            <td>
                                <span class="badge" style="background-color:#ff85a2;">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td>

                                <a href="{{ route('products.show', $item->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    Detail
                                </a>

                                <a href="{{ route('products.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm text-white">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $item->id) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>

    </div>

</body>

</html>
