<?php require_once '../includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Manage Orders</h1>

    <div class="card p-4 shadow-sm">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1001</td>
                    <td>Customer User</td>
                    <td>Dell Latitude Laptop</td>
                    <td>R4,500.00</td>
                    <td>Pending</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                </tr>

                <tr>
                    <td>1002</td>
                    <td>Customer User</td>
                    <td>Accounting Textbook</td>
                    <td>R350.00</td>
                    <td>Completed</td>
                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                </tr>
            </tbody>
        </table>

        <a href="/admin/dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
