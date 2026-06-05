<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
function is_logged_in() { return isset($_SESSION['user_id']); }
function current_role() { return $_SESSION['role_name'] ?? 'Guest'; }
function require_login() { if (!is_logged_in()) { header('Location: /campustrade/login.php'); exit; } }
function require_role($roles) {
    require_login();
    if (!in_array(current_role(), (array)$roles)) { header('Location: /campustrade/index.php?error=access_denied'); exit; }
}
?>
