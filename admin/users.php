<?php require_once '../includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Manage Users</h1>

    <div class="card p-4 shadow-sm">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Admin User</td>
                    <td>admin@campustrade.co.za</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Seller User</td>
                    <td>seller@campustrade.co.za</td>
                    <td>Seller</td>
                    <td>Active</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Customer User</td>
                    <td>customer@campustrade.co.za</td>
                    <td>Customer</td>
                    <td>Active</td>
                    <td>
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
