<?php include 'includes/db.php'; include 'includes/header.php'; ?>
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="display-4 fw-bold">Buy and sell directly with other customers.</h1>
        <p class="lead mt-3">CampusTrade is a C2C marketplace for textbooks, electronics, clothing, accessories and household goods.</p>
        <div class="d-flex gap-2 mt-4 flex-wrap">
          <a href="products.php" class="btn btn-light btn-lg">Browse Products</a>
          <a href="sell-product.php" class="btn btn-outline-light btn-lg">Start Selling</a>
        </div>
      </div>
      <div class="col-lg-5"><div class="hero-card"><h3>Marketplace Features</h3><p>Customer registration, seller listings, product browsing, cart, checkout and RBAC admin management.</p></div></div>
    </div>
  </div>
</section>
<section class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4"><h2 class="section-title">Featured Products</h2><a href="products.php">View all</a></div>
  <div class="row g-4">
  <?php
    $sql = "SELECT p.*, c.category_name, u.full_name FROM products p JOIN categories c ON p.category_id=c.category_id JOIN users u ON p.seller_id=u.user_id WHERE p.status='Approved' ORDER BY p.created_at DESC LIMIT 6";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)):
  ?>
    <div class="col-md-4">
      <div class="product-card">
        <img class="product-img" src="<?php echo htmlspecialchars($row['product_image'] ?: 'assets/images/placeholder.svg'); ?>" alt="Product image">
        <div class="p-3"><span class="badge badge-soft mb-2"><?php echo htmlspecialchars($row['category_name']); ?></span><h5><?php echo htmlspecialchars($row['product_name']); ?></h5><p class="text-muted small">Seller: <?php echo htmlspecialchars($row['full_name']); ?></p><div class="d-flex justify-content-between align-items-center"><strong>R<?php echo number_format($row['price'],2); ?></strong><a class="btn btn-primary btn-sm" href="product-details.php?id=<?php echo $row['product_id']; ?>">View</a></div></div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</section>
<?php include 'includes/footer.php'; ?>
