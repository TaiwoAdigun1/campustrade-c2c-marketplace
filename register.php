<?php include 'includes/db.php'; include 'includes/header.php';
$message='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $full=mysqli_real_escape_string($conn,$_POST['full_name']); $email=mysqli_real_escape_string($conn,$_POST['email']); $phone=mysqli_real_escape_string($conn,$_POST['phone']); $role=(int)$_POST['role_id']; $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
 $sql="INSERT INTO users(role_id, full_name, email, password, phone) VALUES($role,'$full','$email','$pass','$phone')";
 $message = mysqli_query($conn,$sql) ? '<div class="alert alert-success">Account created. You can now login.</div>' : '<div class="alert alert-danger">Could not register. Email may already exist.</div>';
}
?>
<div class="form-shell"><h2 class="mb-3">Create account</h2><?php echo $message; ?><form method="post"><input class="form-control mb-3" name="full_name" placeholder="Full name" required><input class="form-control mb-3" type="email" name="email" placeholder="Email" required><input class="form-control mb-3" name="phone" placeholder="Phone"><select class="form-select mb-3" name="role_id"><option value="3">Customer</option><option value="2">Seller</option></select><input class="form-control mb-3" type="password" name="password" placeholder="Password" required><button class="btn btn-primary w-100">Register</button></form></div>
<?php include 'includes/footer.php'; ?>
