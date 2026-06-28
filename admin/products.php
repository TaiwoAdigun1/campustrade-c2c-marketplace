<?php require_once '../includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Manage Products</h1>

    <div class="card p-4 shadow-sm">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Seller</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Dell Latitude Laptop</td>
                    <td>Thabo Mokoena</td>
                    <td>Electronics</td>
                    <td>R4,500.00</td>
                    <td>Approved</td>
                    <td>
                        <button class="btn btn-sm btn-success">Approve</button>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Accounting Textbook</td>
                    <td>Lerato Phiri</td>
                    <td>Books</td>
                    <td>R350.00</td>
                    <td>Approved</td>
                    <td>
                        <button class="btn btn-sm btn-success">Approve</button>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Nike Sneakers</td>
                    <td>Jason N.</td>
                    <td>Fashion</td>
                    <td>R800.00</td>
                    <td>Pending</td>
                    <td>
                        <button class="btn btn-sm btn-success">Approve</button>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="/admin/dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
