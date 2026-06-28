<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/header.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;

foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['cart']);

    $message = '
        <div class="alert alert-success">
            Order placed successfully. This is a prototype checkout confirmation.
        </div>
    ';
}
?>

<section class="container py-5">
    <h1 class="section-title mb-4">Checkout</h1>

    <?php echo $message; ?>

    <?php if (empty($cart) && $message === ''): ?>

        <div class="alert alert-info">
            Your cart is empty. Please add products before checking out.
        </div>

        <a href="/products.php" class="btn btn-primary">Browse Products</a>

    <?php elseif ($message === ''): ?>

        <div class="row g-4">
            <div class="col-md-7">
                <div class="form-shell m-0">
                    <h4>Customer Details</h4>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Delivery / Collection Address</label>
                            <textarea class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" required>
                                <option value="">Select payment method</option>
                                <option>Cash on Collection</option>
                                <option>EFT</option>
                                <option>Card Payment Demo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Confirm Order
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card p-4 shadow-sm">
                    <h4>Order Summary</h4>

                    <?php foreach ($cart as $item): ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <span>
                                <?php echo htmlspecialchars($item['name']); ?> 
                                x <?php echo (int)$item['quantity']; ?>
                            </span>

                            <strong>
                                R<?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                            </strong>
                        </div>
                    <?php endforeach; ?>

                    <h4 class="mt-3">
                        Total: R<?php echo number_format($total, 2); ?>
                    </h4>
                </div>
            </div>
        </div>

    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
