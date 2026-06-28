<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'includes/header.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $accounts = [
        'admin@campustrade.co.za' => [
            'password' => 'Admin123!',
            'name' => 'Admin User',
            'role' => 'Admin',
            'redirect' => '/admin/dashboard.php'
        ],
        'seller@campustrade.co.za' => [
            'password' => 'Admin123!',
            'name' => 'Seller User',
            'role' => 'Seller',
            'redirect' => '/seller-dashboard.php'
        ],
        'customer@campustrade.co.za' => [
            'password' => 'Admin123!',
            'name' => 'Customer User',
            'role' => 'Customer',
            'redirect' => '/index.php'
        ]
    ];

    if (isset($accounts[$email]) && $password === $accounts[$email]['password']) {
        $_SESSION['user_id'] = 1;
        $_SESSION['full_name'] = $accounts[$email]['name'];
        $_SESSION['role_name'] = $accounts[$email]['role'];
        $_SESSION['email'] = $email;

        header("Location: " . $accounts[$email]['redirect']);
        exit;
    } else {
        $error = "Invalid login details. Please try again.";
    }
}
?>

<section class="container py-5">
    <div class="form-shell">
        <h1 class="mb-3">Login</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login.php">
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="Enter your email"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </form>

        <div class="mt-4 small text-muted">
            <strong>Demo Login Details</strong><br>
            Admin: admin@campustrade.co.za / Admin123!<br>
            Seller: seller@campustrade.co.za / Admin123!<br>
            Customer: customer@campustrade.co.za / Admin123!
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
