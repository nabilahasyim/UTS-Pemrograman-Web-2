<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Category</title>

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
            Category Skincare
        </h1>

        <a href="{{ route('categories.create') }}" class="btn text-white mb-3"
            style="background-color:#ff85a2; border:none;">
            + Add Category
        </a>

        <!-- SEARCH -->
        <form action="{{ route('categories.index') }}" method="GET" class="row mb-3">

            <div class="col-md-4">

                <input type="text" name="search" class="form-control" placeholder="Search category...">

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
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($categories as $item)
                        <tr>

                            <td>{{ $categories->firstItem() + $loop->index }}</td>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->description }}</td>

                            <td>
                                <span class="badge" style="background-color:#ff85a2;">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td>

                                <a href="{{ route('categories.show', $item->id) }}"
                                    class="btn btn-info btn-sm text-white">
                                    Detail
                                </a>

                                <a href="{{ route('categories.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm text-white">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
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
            {{ $categories->links() }}
        </div>

    </div>

</body>

</html>
