<?php
require_once 'includes/header.php';
?>

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-7">
                <h1>Buy and sell directly with other customers.</h1>
                <p>
                    CampusTrade is a C2C marketplace for textbooks, electronics,
                    clothing, accessories and household goods.
                </p>

                <div class="mt-4">
                    <a href="/products.php" class="btn btn-light me-2">Browse Products</a>
                    <a href="/sell-product.php" class="btn btn-outline-light">Start Selling</a>
                </div>
            </div>

            <div class="col-md-5">
                <div class="feature-box">
                    <h3>Marketplace Features</h3>
                    <p>
                        Customer registration, seller listings, product browsing,
                        cart, checkout and RBAC admin management.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title mb-0">Featured Products</h2>
        <a href="/products.php">View all</a>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="product-card">
                <img src="/assets/images/sneakers.jpg" class="product-img" alt="Nike Sneakers">
                <div class="p-3">
                    <span class="badge bg-primary mb-2">Fashion</span>
                    <h5>Nike Sneakers</h5>
                    <p class="text-muted mb-1">Seller: Jason N.</p>
                    <p class="fw-bold">R800.00</p>
                    <a href="/product-details.php?id=4" class="btn btn-primary w-100">View Product</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="product-card">
                <img src="/assets/images/desk.jpg" class="product-img" alt="Study Desk">
                <div class="p-3">
                    <span class="badge bg-primary mb-2">Furniture</span>
                    <h5>Study Desk</h5>
                    <p class="text-muted mb-1">Seller: Naledi S.</p>
                    <p class="fw-bold">R1,200.00</p>
                    <a href="/product-details.php?id=5" class="btn btn-primary w-100">View Product</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="product-card">
                <img src="/assets/images/speaker.jpg" class="product-img" alt="Bluetooth Speaker">
                <div class="p-3">
                    <span class="badge bg-primary mb-2">Electronics</span>
                    <h5>Bluetooth Speaker</h5>
                    <p class="text-muted mb-1">Seller: Musa D.</p>
                    <p class="fw-bold">R450.00</p>
                    <a href="/product-details.php?id=6" class="btn btn-primary w-100">View Product</a>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
require_once 'includes/footer.php';
?>
