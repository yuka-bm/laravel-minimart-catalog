<div class="modal fade" id="delete-product-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3">Delete Product</h1>
                <hr>
            </div>
            <div class="modal-body">
                <h2 class="h4 fw-bold">{{ $product->name }}</h2>
                <p>
                    Section: <span class="fw-bold">{{ $product->section->name }}</span><br>
                    Price: <span class="fw-bold">{{ $product->price }}</span><br>
                    description: <span class="fw-bold">{{ $product->description }}</span>
                </p>

                <div class="text-end">
                    <form action="{{ route('product.destroy', $product->id) }}" method="post"">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-triangle-exclamation"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>