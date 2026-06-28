<?php
require_once '../includes/header.php';
?>

<section class="container py-5">
    <h1 class="section-title mb-4">Admin Dashboard</h1>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <h5>Total Users</h5>
                <h2>6</h2>
                <p class="text-muted">Registered users</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h5>Total Products</h5>
                <h2>15</h2>
                <p class="text-muted">Marketplace listings</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h5>Total Orders</h5>
                <h2>3</h2>
                <p class="text-muted">Demo orders</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <h5>Pending Approvals</h5>
                <h2>2</h2>
                <p class="text-muted">Products awaiting review</p>
            </div>
        </div>
    </div>

    <div class="card p-4 shadow-sm">
        <h4>Admin Management</h4>
        <p class="text-muted">
            The admin dashboard allows administrators to manage users, roles, products, categories and orders.
        </p>

        <div class="row g-3">
            <div class="col-md-4">
                <a href="/admin/users.php" class="btn btn-primary w-100">Manage Users</a>
            </div>

            <div class="col-md-4">
                <a href="/admin/roles.php" class="btn btn-primary w-100">Manage Roles</a>
            </div>

            <div class="col-md-4">
                <a href="/admin/products.php" class="btn btn-primary w-100">Manage Products</a>
            </div>

            <div class="col-md-4">
                <a href="/admin/categories.php" class="btn btn-outline-primary w-100">Manage Categories</a>
            </div>

            <div class="col-md-4">
                <a href="/admin/orders.php" class="btn btn-outline-primary w-100">Manage Orders</a>
            </div>

            <div class="col-md-4">
                <a href="/index.php" class="btn btn-outline-secondary w-100">Back to Website</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../includes/footer.php';
?>
