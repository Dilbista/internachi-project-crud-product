<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    /* Card */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

/* Image Preview */
.product-img-preview {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #e5e5e5;
    display: block;
}

/* Form Labels */
.form-label {
    font-weight: 500;
}

/* Buttons */
.btn-primary, .btn-secondary {
    border-radius: 6px;
    padding: 6px 18px;
}

</style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Product</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" 
                                   value="{{ old('name', $products->name) }}" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $products->description) }}</textarea>
                        </div>

                        <!-- Purchase Price -->
                        <div class="mb-3">
                            <label class="form-label">Purchase Price <span class="text-danger">*</span></label>
                            <input type="number" name="purchase_price" class="form-control" 
                                   value="{{ old('purchase_price', $products->purchase_price) }}" step="0.01" required>
                        </div>

                        <!-- Selling Price -->
                        <div class="mb-3">
                            <label class="form-label">Selling Price <span class="text-danger">*</span></label>
                            <input type="number" name="selling_price" class="form-control" 
                                   value="{{ old('selling_price', $products->selling_price) }}" step="0.01" required>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" class="form-control" 
                                   value="{{ old('quantity', $products->quantity) }}" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="active" {{ $products->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $products->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($products->image)
                                <img src="{{ asset('storage/products/'.$products->image) }}" 
                                     class="mt-2 product-img-preview">
                            @endif
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

