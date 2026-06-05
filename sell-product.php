<?php include 'includes/db.php'; include 'includes/auth.php'; require_role(['Customer','Seller','Admin']); include 'includes/header.php';
$message=''; $cats=mysqli_query($conn,"SELECT * FROM categories ORDER BY category_name");
if($_SERVER['REQUEST_METHOD']==='POST'){
 $seller=(int)$_SESSION['user_id']; $cat=(int)$_POST['category_id']; $name=mysqli_real_escape_string($conn,$_POST['product_name']); $desc=mysqli_real_escape_string($conn,$_POST['description']); $price=(float)$_POST['price']; $image=mysqli_real_escape_string($conn,$_POST['product_image']);
 $sql="INSERT INTO products(seller_id,category_id,product_name,description,price,product_image,status) VALUES($seller,$cat,'$name','$desc',$price,'$image','Pending')";
 $message=mysqli_query($conn,$sql)?'<div class="alert alert-success">Product submitted for admin approval.</div>':'<div class="alert alert-danger">Product could not be saved.</div>';
}
?>
<section class="container py-5"><div class="form-shell"><h2>Sell a product</h2><p class="text-muted">Products are listed after admin approval.</p><?php echo $message; ?><form method="post"><input class="form-control mb-3" name="product_name" placeholder="Product name" required><textarea class="form-control mb-3" name="description" placeholder="Description" rows="4" required></textarea><input class="form-control mb-3" type="number" step="0.01" name="price" placeholder="Price" required><input class="form-control mb-3" name="product_image" placeholder="Image URL or assets/images/file.jpg"><select class="form-select mb-3" name="category_id"><?php while($c=mysqli_fetch_assoc($cats)): ?><option value="<?php echo $c['category_id']; ?>"><?php echo htmlspecialchars($c['category_name']); ?></option><?php endwhile; ?></select><button class="btn btn-primary w-100">Submit Product</button></form></div></section>
<?php include 'includes/footer.php'; ?>
