<?php require_once '../includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Manage Categories</h1>

    <div class="card p-4 shadow-sm">
        <form class="row g-2 mb-4">
            <div class="col-md-9">
                <input class="form-control" placeholder="Enter new category name">
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-primary w-100">Add Category</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr><td>1</td><td>Electronics</td><td><button class="btn btn-sm btn-outline-primary">Edit</button></td></tr>
                <tr><td>2</td><td>Books</td><td><button class="btn btn-sm btn-outline-primary">Edit</button></td></tr>
                <tr><td>3</td><td>Fashion</td><td><button class="btn btn-sm btn-outline-primary">Edit</button></td></tr>
                <tr><td>4</td><td>Furniture</td><td><button class="btn btn-sm btn-outline-primary">Edit</button></td></tr>
            </tbody>
        </table>

        <a href="/admin/dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
