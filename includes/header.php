<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CampusTrade C2C Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/campustrade/assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/campustrade/index.php">CampusTrade</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/campustrade/products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="/campustrade/sell-product.php">Sell</a></li>
        <li class="nav-item"><a class="nav-link" href="/campustrade/cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="/campustrade/my-orders.php">My Orders</a></li>
        <li class="nav-item"><a class="nav-link" href="/campustrade/contact.php">Help</a></li>
      </ul>
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])): ?>
          <?php if(($_SESSION['role_name'] ?? '') === 'Admin'): ?>
            <li class="nav-item"><a class="nav-link" href="/campustrade/admin/dashboard.php">Admin</a></li>
          <?php endif; ?>
          <li class="nav-item"><span class="nav-link">Hi, <?php echo htmlspecialchars($_SESSION['full_name']); ?></span></li>
          <li class="nav-item"><a class="btn btn-light btn-sm mt-1" href="/campustrade/logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/campustrade/login.php">Login</a></li>
          <li class="nav-item"><a class="btn btn-light btn-sm mt-1" href="/campustrade/register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main>
