<?php 
include 'includes/db.php'; 
include 'includes/header.php'; 

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$where = "WHERE p.status='Approved'";

if ($search !== '') {
    $s = mysqli_real_escape_string($conn, $search);
    $where .= " AND (p.name LIKE '%$s%' OR p.description LIKE '%$s%')";
}

if ($category !== '') {
    $c = mysqli_real_escape_string($conn, $category);
    $where .= " AND c.category_name = '$c'";
}

$cats = mysqli_query($conn, "SELECT * FROM categories ORDER BY category_name");

$sql = "SELECT 
            p.product_id,
            p.name AS product_name,
            p.description,
            p.price,
            p.product_image,
            p.status,
            c.category_name,
            u.full_name AS seller_name
        FROM products p
        JOIN categories c ON p.category_id = c.category_id
        JOIN users u ON p.seller_id = u.user_id
        $where
        ORDER BY p.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<section class="container py-5">
    <h1 class="section-title mb-4">Products</h1>

    <form class="row g-2 mb-4" method="GET">
        <div class="col-md-6">
            <input 
                class="form-control" 
                name="search" 
                placeholder="Search products" 
                value="<?php echo htmlspecialchars($search); ?>"
            >
        </div>

        <div class="col-md-4">
            <select class="form-select" name="category">
                <option value="">All categories</option>

                <?php while ($cat = mysqli_fetch_assoc($cats)): ?>
                    <option 
                        value="<?php echo htmlspecialchars($cat['category_name']); ?>"
                        <?php echo ($category === $cat['category_name']) ? 'selected' : ''; ?>
                    >
                        <?php echo htmlspecialchars($cat['category_name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="row g-4">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>

                <?php
                    $productId = $row['product_id'] ?? 0;
                    $productName = $row['product_name'] ?? 'Product name unavailable';
                    $productPrice = $row['price'] ?? 0;
                    $productCategory = $row['category_name'] ?? 'Uncategorised';
                    $sellerName = $row['seller_name'] ?? 'Seller User';

                    $productImage = $row['product_image'] ?? '';

                    if ($productImage == '' || !file_exists($productImage)) {
                        $productImage = 'assets/images/placeholder.jpg';
                    }
                ?>

                <div class="col-md-4">
                    <div class="product-card h-100">
                        <img 
                            class="product-img" 
                            src="<?php echo htmlspecialchars($productImage); ?>" 
                            alt="<?php echo htmlspecialchars($productName); ?>"
                        >

                        <div class="p-3">
                            <span class="badge bg-primary mb-2">
                                <?php echo htmlspecialchars($productCategory); ?>
                            </span>

                            <h5 class="fw-bold">
                                <?php echo htmlspecialchars($productName); ?>
                            </h5>

                            <p class="text-muted mb-1">
                                Seller: <?php echo htmlspecialchars($sellerName); ?>
                            </p>

                            <p class="fw-bold">
                                R<?php echo number_format($productPrice, 2); ?>
                            </p>

                            <a 
                                href="product-details.php?id=<?php echo $productId; ?>" 
                                class="btn btn-primary w-100"
                            >
                                View Product
                            </a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">
                    No products found.
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>