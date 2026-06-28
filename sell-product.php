<?php
require_once 'includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = trim($_POST['product_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $condition = trim($_POST['condition'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($productName !== '' && $category !== '' && $price !== '' && $description !== '') {
        $message = '
            <div class="alert alert-success">
                Product submitted successfully. In the full system, this listing will be reviewed by the admin before appearing on the marketplace.
            </div>
        ';
    } else {
        $message = '
            <div class="alert alert-danger">
                Please complete all required fields before submitting your product.
            </div>
        ';
    }
}
?>

<section class="container py-5">
    <div class="form-shell">
        <h1 class="mb-3">Sell a Product</h1>

        <p class="text-muted">
            Complete the form below to list an item for sale on CampusTrade. 
            Products are submitted for admin review before they appear on the marketplace.
        </p>

        <?php echo $message; ?>

        <form method="POST" action="/sell-product.php" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                <input 
                    type="text" 
                    name="product_name" 
                    class="form-control" 
                    placeholder="Example: Dell Laptop, Textbook, Sneakers"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Category <span class="text-danger">*</span></label>
                <select name="category" class="form-select" required>
                    <option value="">Select category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Books">Books</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Appliances">Appliances</option>
                    <option value="Stationery">Stationery</option>
                    <option value="Sports">Sports</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Price <span class="text-danger">*</span></label>
                <input 
                    type="number" 
                    name="price" 
                    class="form-control" 
                    placeholder="Example: 450"
                    min="1"
                    step="0.01"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Condition</label>
                <select name="condition" class="form-select">
                    <option value="">Select condition</option>
                    <option value="New">New</option>
                    <option value="Like New">Like New</option>
                    <option value="Good">Good</option>
                    <option value="Used">Used</option>
                    <option value="Needs Repair">Needs Repair</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input 
                    type="text" 
                    name="location" 
                    class="form-control" 
                    placeholder="Example: Pretoria, Hatfield, Johannesburg"
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input 
                    type="file" 
                    name="product_image" 
                    class="form-control"
                    accept="image/*"
                >
                <small class="text-muted">
                    Uploading images is included for prototype purposes.
                </small>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Description <span class="text-danger">*</span></label>
                <textarea 
                    name="description" 
                    class="form-control" 
                    rows="5" 
                    placeholder="Describe the item, its condition, reason for selling, and any important details."
                    required
                ></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Submit Product Listing
            </button>

            <a href="/products.php" class="btn btn-outline-secondary w-100 mt-2">
                Back to Products
            </a>
        </form>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
