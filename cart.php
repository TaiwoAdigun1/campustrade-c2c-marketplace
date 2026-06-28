<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/header.php';

if (isset($_GET['remove'])) {
    $removeId = (int)$_GET['remove'];

    if (isset($_SESSION['cart'][$removeId])) {
        unset($_SESSION['cart'][$removeId]);
    }

    header("Location: /cart.php");
    exit;
}

if (isset($_GET['clear'])) {
    unset($_SESSION['cart']);
    header("Location: /cart.php");
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<section class="container py-5">
    <h1 class="section-title mb-4">Shopping Cart</h1>

    <?php if (empty($cart)): ?>

        <div class="alert alert-info">
            Your cart is currently empty. Browse products and add items to your cart.
        </div>

        <a href="/products.php" class="btn btn-primary">Browse Products</a>

    <?php else: ?>

        <div class="card p-3 shadow-sm">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($cart as $item): ?>
                            <?php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            ?>

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img 
                                            src="/assets/images/<?php echo htmlspecialchars($item['image']); ?>" 
                                            alt="<?php echo htmlspecialchars($item['name']); ?>"
                                            style="width:80px; height:70px; object-fit:contain; background:#f4f6f8; border-radius:10px;"
                                        >

                                        <strong>
                                            <?php echo htmlspecialchars($item['name']); ?>
                                        </strong>
                                    </div>
                                </td>

                                <td>R<?php echo number_format($item['price'], 2); ?></td>

                                <td><?php echo (int)$item['quantity']; ?></td>

                                <td>R<?php echo number_format($subtotal, 2); ?></td>

                                <td>
                                    <a 
                                        href="/cart.php?remove=<?php echo (int)$item['id']; ?>" 
                                        class="btn btn-sm btn-outline-danger"
                                    >
                                        Remove
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="/products.php" class="btn btn-outline-primary">Continue Shopping</a>

                <div class="text-end">
                    <h4>Total: R<?php echo number_format($total, 2); ?></h4>
                    <a href="/checkout.php" class="btn btn-primary">Proceed to Checkout</a>
                    <a href="/cart.php?clear=1" class="btn btn-outline-danger">Clear Cart</a>
                </div>
            </div>
        </div>

    <?php endif; ?>
</section>

<?php require_once 'includes/footer.php'; ?>
