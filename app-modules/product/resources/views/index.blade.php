
<style>

    /* Card */
.product-card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* Header */
.product-header {
    background: #ffffff;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
}

/* Table */
.product-table thead th {
    background: #f8f9fa;
    font-size: 13px;
    text-transform: uppercase;
    color: #6c757d;
    border-bottom: 1px solid #dee2e6;
}

.product-table tbody tr {
    transition: background 0.2s ease;
}

.product-table tbody tr:hover {
    background-color: #f9fbfd;
}

/* Status badge */
.status {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status.active {
    background: #e7f9f0;
    color: #198754;
}

.status.inactive {
    background: #fdecea;
    color: #dc3545;
}

/* Image */
.product-img {
    width: 45px;
    height: 45px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #e5e5e5;
}

/* Quantity */
.qty-badge {
    background: #e9ecef;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card product-card">
                <!-- Header -->
                <div class="card-header product-header">
                    <h5 class="mb-0">Product List</h5>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                        + Add Product
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table product-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Purchase</th>
                                    <th>Selling</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Qty</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                         <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $product->name }}</td>
                                        <td class="text-muted">
                                            {{ Str::limit($product->description, 40) }}
                                        </td>

                                        <td>Rs. {{ number_format($product->purchase_price, 2) }}</td>
                                        <td>Rs. {{ number_format($product->selling_price, 2) }}</td>

                                        <td>
                                            <span class="status {{ $product->status }}">
                                                {{ ucfirst($product->status) }}
                                            </span>
                                        </td>

                                        <td>
                                            @if($product->image)
                                                <img src="{{ asset('storage/products/'.$product->image) }}"
                                                     class="product-img">
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="qty-badge">{{ $product->quantity }}</span>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('product.destroy', $product->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Delete product?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">
                                            No products available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
