<?php include 'includes/db.php'; include 'includes/auth.php'; require_login();
$product_id=(int)($_GET['id'] ?? 0); $customer_id=(int)$_SESSION['user_id'];
$cart=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM cart WHERE customer_id=$customer_id LIMIT 1"));
if(!$cart){ mysqli_query($conn,"INSERT INTO cart(customer_id) VALUES($customer_id)"); $cart_id=mysqli_insert_id($conn); } else { $cart_id=$cart['cart_id']; }
$existing=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM cart_items WHERE cart_id=$cart_id AND product_id=$product_id"));
if($existing){ mysqli_query($conn,"UPDATE cart_items SET quantity=quantity+1 WHERE cart_item_id=".(int)$existing['cart_item_id']); } else { mysqli_query($conn,"INSERT INTO cart_items(cart_id,product_id,quantity) VALUES($cart_id,$product_id,1)"); }
header('Location: cart.php'); exit;
?>
