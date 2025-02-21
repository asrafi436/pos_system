@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form id="addItemForm" method="POST" action="{{ route('products.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Product Type</label>
        <select name="type" class="form-control" required>
            <option value="">Select Type</option>
            <option value="Beverage">Beverage</option>
            <option value="Food">Food</option>
            <option value="Snack">Snack</option>
            <option value="Coffee">Coffee</option>
            <option value="Desserts">Desserts</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Purchase Price</label>
        <input type="number" name="purchase_price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Selling Price</label>
        <input type="number" name="selling_price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Total Sold Quantity</label>
        <input type="number" name="total_sold_quantity" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success w-100">Add Item</button>
</form>
