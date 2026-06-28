<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$products = [
    1 => ['name' => 'Dell Latitude Laptop', 'price' => 4500, 'image' => 'laptop.jpg'],
    2 => ['name' => 'iPhone 11 64GB', 'price' => 5200, 'image' => 'iphone.jpg'],
    3 => ['name' => 'Accounting Textbook', 'price' => 350, 'image' => 'textbook.jpg'],
    4 => ['name' => 'Nike Sneakers', 'price' => 800, 'image' => 'sneakers.jpg'],
    5 => ['name' => 'Study Desk', 'price' => 1200, 'image' => 'desk.jpg'],
    6 => ['name' => 'Bluetooth Speaker', 'price' => 450, 'image' => 'speaker.jpg'],
    7 => ['name' => 'Scientific Calculator', 'price' => 300, 'image' => 'calculator.jpg'],
    8 => ['name' => 'Backpack', 'price' => 250, 'image' => 'backpack.jpg'],
    9 => ['name' => 'Microwave Oven', 'price' => 900, 'image' => 'microwave.jpg'],
    10 => ['name' => 'Office Chair', 'price' => 750, 'image' => 'chair.jpg'],
    11 => ['name' => 'Hair Dryer', 'price' => 400, 'image' => 'hairdryer.jpg'],
    12 => ['name' => 'Graphic Design Tablet', 'price' => 1600, 'image' => 'tablet.jpg'],
    13 => ['name' => 'Medical Terminology Book', 'price' => 500, 'image' => 'medical-book.jpg'],
    14 => ['name' => 'Soccer Boots', 'price' => 650, 'image' => 'boots.jpg'],
    15 => ['name' => 'Ring Light', 'price' => 550, 'image' => 'ringlight.jpg']
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0 && isset($products[$id])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $products[$id]['name'],
            'price' => $products[$id]['price'],
            'image' => $products[$id]['image'],
            'quantity' => 1
        ];
    }
}

header("Location: /cart.php");
exit;
?>
