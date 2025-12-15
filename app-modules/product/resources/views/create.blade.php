<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container mt-5">
    <h2 class="text-center mb-4">Product Form</h2>

       <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Product Name --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Name</label>
                    <input type="text" class="form-control" name="name"
                           value="{{ old('name') }}" required>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price"
                           value="{{ old('price') }}" required>
                </div>

                {{-- Purchase --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Purchase</label>
                    <input type="number" step="0.01" class="form-control" name="purchase"
                           value="{{ old('purchase') }}">
                </div>

                {{-- Selling --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Selling</label>
                    <input type="number" step="0.01" class="form-control" name="selling"
                           value="{{ old('selling') }}">
                </div>

                {{-- Quantity --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control" name="quantity"
                           value="{{ old('quantity') }}">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Select Status --</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                {{-- Image --}}
                <div class="mb-4">
                    <label class="form-label fw-bold">Product Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Save Product
                </button>

            </form>
</div>