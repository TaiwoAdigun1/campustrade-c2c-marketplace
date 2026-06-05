<?php include 'includes/db.php'; include 'includes/auth.php'; require_login(); include 'includes/header.php';
$customer_id=(int)$_SESSION['user_id']; $message='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $items=mysqli_query($conn,"SELECT ci.*, p.price FROM cart_items ci JOIN cart c ON ci.cart_id=c.cart_id JOIN products p ON ci.product_id=p.product_id WHERE c.customer_id=$customer_id"); $total=0; $rows=[]; while($r=mysqli_fetch_assoc($items)){ $total += $r['quantity']*$r['price']; $rows[]=$r; }
 mysqli_query($conn,"INSERT INTO orders(customer_id, order_status, total_amount) VALUES($customer_id,'Placed',$total)"); $order_id=mysqli_insert_id($conn);
 foreach($rows as $r){ mysqli_query($conn,"INSERT INTO order_items(order_id, product_id, quantity, price) VALUES($order_id,".(int)$r['product_id'].",".(int)$r['quantity'].",".(float)$r['price'].")"); }
 mysqli_query($conn,"INSERT INTO payments(order_id,payment_method,payment_status) VALUES($order_id,'Cash on delivery','Pending')");
 mysqli_query($conn,"DELETE ci FROM cart_items ci JOIN cart c ON ci.cart_id=c.cart_id WHERE c.customer_id=$customer_id");
 $message='<div class="alert alert-success">Order placed successfully.</div>';
}
?>
<section class="container py-5"><div class="form-shell"><h2>Checkout</h2><?php echo $message; ?><p>This demo uses cash on delivery as a safe sample payment method.</p><form method="post"><button class="btn btn-primary w-100">Confirm Order</button></form></div></section>
<?php include 'includes/footer.php'; ?>
