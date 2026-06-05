<?php include 'includes/db.php'; include 'includes/header.php';
$id = (int)($_GET['id'] ?? 0);
$result = mysqli_query($conn, "SELECT p.*, c.category_name, u.full_name FROM products p JOIN categories c ON p.category_id=c.category_id JOIN users u ON p.seller_id=u.user_id WHERE p.product_id=$id");
$product = mysqli_fetch_assoc($result);
if(!$product){ echo '<div class="container py-5"><div class="alert alert-danger">Product not found.</div></div>'; include 'includes/footer.php'; exit; }
?>
<section class="container py-5"><div class="row g-4"><div class="col-md-6"><img class="img-fluid rounded-4 shadow-sm w-100" style="max-height:480px;object-fit:cover" src="<?php echo htmlspecialchars($product['product_image'] ?: 'assets/images/placeholder.svg'); ?>" alt="Product"></div><div class="col-md-6"><span class="badge badge-soft mb-3"><?php echo htmlspecialchars($product['category_name']); ?></span><h1><?php echo htmlspecialchars($product['product_name']); ?></h1><h3 class="text-primary my-3">R<?php echo number_format($product['price'],2); ?></h3><p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p><p class="text-muted">Seller: <?php echo htmlspecialchars($product['full_name']); ?></p><a class="btn btn-primary btn-lg" href="add-to-cart.php?id=<?php echo $product['product_id']; ?>">Add to Cart</a></div></div></section>
<?php include 'includes/footer.php'; ?>
