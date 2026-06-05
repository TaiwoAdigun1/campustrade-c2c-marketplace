<?php
session_start();
require_once 'includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $sql = "SELECT users.*, roles.role_name 
            FROM users 
            INNER JOIN roles ON users.role_id = roles.role_id 
            WHERE users.email = ? 
            LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role_name'];

        if ($user['role_name'] === 'Admin') {
            header("Location: admin/index.php");
            exit;
        } elseif ($user['role_name'] === 'Seller') {
            header("Location: seller-dashboard.php");
            exit;
        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        $error = "Invalid login details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - CampusTrade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h1 class="mb-3">Login</h1>

                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <p class="small mt-3">
                    Demo admin: admin@campustrade.co.za / Admin123!
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>