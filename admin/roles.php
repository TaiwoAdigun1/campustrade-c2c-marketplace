<?php require_once '../includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Manage Roles</h1>

    <div class="card p-4 shadow-sm">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Admin</td>
                    <td>Manage users, roles, products, categories and orders.</td>
                    <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                </tr>

                <tr>
                    <td>Seller</td>
                    <td>Add products, manage listings and view sales.</td>
                    <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                </tr>

                <tr>
                    <td>Customer</td>
                    <td>Browse products, add to cart, checkout and view orders.</td>
                    <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                </tr>
            </tbody>
        </table>

        <a href="/admin/dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
