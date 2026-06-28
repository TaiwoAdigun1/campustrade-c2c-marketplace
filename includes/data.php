<?php
function money($amount) {
    return 'R' . number_format((float)$amount, 2);
}

function getProducts($conn) {
    $sql = "SELECT 
                p.product_id,
                p.name AS product_name,
                p.description,
                p.price,
                p.product_image,
                p.status,
                c.category_name,
                u.full_name AS seller_name
            FROM products p
            JOIN categories c ON p.category_id = c.category_id
            JOIN users u ON p.seller_id = u.user_id
            WHERE p.status = 'Approved'
            ORDER BY p.created_at DESC";

    return mysqli_query($conn, $sql);
}
?>
