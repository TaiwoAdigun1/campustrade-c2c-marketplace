<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header("Location: /login.php");
        exit;
    }
}

function require_role($roles) {
    require_login();

    if (!isset($_SESSION['role_name']) || !in_array($_SESSION['role_name'], $roles)) {
        header("Location: /index.php?error=access_denied");
        exit;
    }
}
?>
