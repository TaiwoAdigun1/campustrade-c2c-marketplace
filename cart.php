<?php include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php';
$customer_id=(int)$_SESSION['user_id'];
$result=mysqli_query($conn,"SELECT ci.*, p.product_name, p.price FROM cart_items ci JOIN cart c ON ci.cart_id=c.cart_id JOIN products p ON ci.product_id=p.product_id WHERE c.customer_id=$customer_id"); $total=0;
?>
<section class="container py-5"><h1 class="section-title mb-4">Cart</h1><div class="table-card"><table class="table"><thead><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr></thead><tbody><?php while($row=mysqli_fetch_assoc($result)): $sub=$row['quantity']*$row['price']; $total+=$sub; ?><tr><td><?php echo htmlspecialchars($row['product_name']); ?></td><td><?php echo $row['quantity']; ?></td><td>R<?php echo number_format($row['price'],2); ?></td><td>R<?php echo number_format($sub,2); ?></td></tr><?php endwhile; ?></tbody></table><h4>Total: R<?php echo number_format($total,2); ?></h4><a class="btn btn-primary" href="checkout.php">Checkout</a></div></section>
<?php include 'includes/footer.php'; ?>
