<?php
$demoProducts = [
 ['id'=>1,'name'=>'Dell Latitude Laptop','category'=>'Electronics','price'=>4500,'seller'=>'Thabo M.','condition'=>'Used - Good','location'=>'Johannesburg','stock'=>1,'status'=>'Approved','description'=>'Reliable Dell Latitude laptop, perfect for students. Comes with charger.','image'=>'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=600&fit=crop'],
 ['id'=>2,'name'=>'iPhone 11 64GB','category'=>'Electronics','price'=>5200,'seller'=>'Ayesha K.','condition'=>'Used - Excellent','location'=>'Cape Town','stock'=>1,'status'=>'Approved','description'=>'iPhone 11 in excellent condition. Battery health 89%. Original box included.','image'=>'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&h=600&fit=crop'],
 ['id'=>3,'name'=>'Accounting Textbook','category'=>'Books','price'=>350,'seller'=>'Lerato P.','condition'=>'Used - Good','location'=>'Pretoria','stock'=>2,'status'=>'Approved','description'=>'First-year accounting textbook with minimal highlights.','image'=>'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=600&fit=crop'],
 ['id'=>4,'name'=>'Nike Sneakers','category'=>'Fashion','price'=>800,'seller'=>'Jason N.','condition'=>'Used - Good','location'=>'Durban','stock'=>1,'status'=>'Approved','description'=>'Nike sneakers, size UK 9. Worn a few times only.','image'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&h=600&fit=crop'],
 ['id'=>5,'name'=>'Study Desk','category'=>'Furniture','price'=>1200,'seller'=>'Naledi S.','condition'=>'Used - Good','location'=>'Johannesburg','stock'=>1,'status'=>'Approved','description'=>'Solid wood study desk with spacious surface and one drawer.','image'=>'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=800&h=600&fit=crop'],
 ['id'=>6,'name'=>'Bluetooth Speaker','category'=>'Electronics','price'=>450,'seller'=>'Musa D.','condition'=>'New','location'=>'Bloemfontein','stock'=>3,'status'=>'Approved','description'=>'Portable Bluetooth speaker with 10-hour battery life.','image'=>'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=800&h=600&fit=crop'],
 ['id'=>7,'name'=>'Scientific Calculator','category'=>'Stationery','price'=>300,'seller'=>'Taiwo A.','condition'=>'Used - Excellent','location'=>'Pretoria','stock'=>1,'status'=>'Approved','description'=>'Casio fx-991 scientific calculator. All functions working.','image'=>'https://images.unsplash.com/photo-1564939558297-fc396f18e5c7?w=800&h=600&fit=crop'],
 ['id'=>8,'name'=>'Backpack','category'=>'Fashion','price'=>250,'seller'=>'Karabo M.','condition'=>'Used - Good','location'=>'Soweto','stock'=>1,'status'=>'Approved','description'=>'Spacious backpack with laptop compartment.','image'=>'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800&h=600&fit=crop'],
 ['id'=>9,'name'=>'Microwave Oven','category'=>'Appliances','price'=>900,'seller'=>'Sipho Z.','condition'=>'Used - Good','location'=>'Cape Town','stock'=>1,'status'=>'Approved','description'=>'20L microwave oven. Works perfectly for student accommodation.','image'=>'https://images.unsplash.com/photo-1574269910231-bc508bcb42aa?w=800&h=600&fit=crop'],
 ['id'=>10,'name'=>'Office Chair','category'=>'Furniture','price'=>750,'seller'=>'Bianca L.','condition'=>'Used - Good','location'=>'Johannesburg','stock'=>1,'status'=>'Approved','description'=>'Ergonomic office chair with adjustable height.','image'=>'https://images.unsplash.com/photo-1580480055273-228ff5388ef8?w=800&h=600&fit=crop'],
 ['id'=>11,'name'=>'Hair Dryer','category'=>'Appliances','price'=>400,'seller'=>'Amanda T.','condition'=>'Used - Excellent','location'=>'Durban','stock'=>1,'status'=>'Approved','description'=>'Professional hair dryer with multiple heat settings.','image'=>'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?w=800&h=600&fit=crop'],
 ['id'=>12,'name'=>'Graphic Design Tablet','category'=>'Electronics','price'=>1600,'seller'=>'Ethan R.','condition'=>'Used - Good','location'=>'Cape Town','stock'=>1,'status'=>'Approved','description'=>'Drawing tablet with pen included. Suitable for design students.','image'=>'https://images.unsplash.com/photo-1561154464-82e9adf32764?w=800&h=600&fit=crop'],
 ['id'=>13,'name'=>'Medical Terminology Book','category'=>'Books','price'=>500,'seller'=>'Palesa G.','condition'=>'Used - Good','location'=>'Pretoria','stock'=>1,'status'=>'Approved','description'=>'Comprehensive medical terminology reference book.','image'=>'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=800&h=600&fit=crop'],
 ['id'=>14,'name'=>'Soccer Boots','category'=>'Sports','price'=>650,'seller'=>'Daniel M.','condition'=>'Used - Good','location'=>'Johannesburg','stock'=>1,'status'=>'Approved','description'=>'Adidas soccer boots, size UK 8. Studs in good shape.','image'=>'https://images.unsplash.com/photo-1593341646782-e0b495cff86d?w=800&h=600&fit=crop'],
 ['id'=>15,'name'=>'Ring Light','category'=>'Electronics','price'=>550,'seller'=>'Zinhle B.','condition'=>'New','location'=>'Durban','stock'=>2,'status'=>'Approved','description'=>'10-inch ring light with phone holder and tripod.','image'=>'https://images.unsplash.com/photo-1610142657772-cb44e15a7be1?w=800&h=600&fit=crop']
];
$categories = ['Electronics','Books','Fashion','Furniture','Stationery','Appliances','Sports'];
function money($amount){ return 'R' . number_format((float)$amount, 2); }
function getProducts($conn, $demoProducts){
 if ($conn) {
   $sql = "SELECT p.product_id id, p.name, c.category_name category, p.price, u.full_name seller, p.condition_, p.location, p.stock, p.status, p.description, p.image_url image FROM products p JOIN categories c ON p.category_id=c.category_id JOIN users u ON p.seller_id=u.user_id WHERE p.status='Approved' ORDER BY p.product_id";
   $res = @mysqli_query($conn, $sql);
   if ($res && mysqli_num_rows($res)>0) { return mysqli_fetch_all($res, MYSQLI_ASSOC); }
 }
 return $demoProducts;
}
function getProduct($id, $conn, $demoProducts){
 foreach(getProducts($conn,$demoProducts) as $p){ if((int)$p['id']===(int)$id) return $p; }
 return null;
}
function requireRole($roles){
 $roles = (array)$roles;
 if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], $roles)) { header('Location: login.php'); exit; }
}
?>
