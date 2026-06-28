<?php
require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$products = [
    1 => [
        'name' => 'Dell Latitude Laptop',
        'category' => 'Electronics',
        'seller' => 'Thabo Mokoena',
        'price' => 4500,
        'image' => 'laptop.jpg',
        'description' => 'Dell Latitude laptop in good working condition. Suitable for studying, assignments, programming, and daily use.'
    ],
    2 => [
        'name' => 'iPhone 11 64GB',
        'category' => 'Electronics',
        'seller' => 'Ayesha Khan',
        'price' => 5200,
        'image' => 'iphone.jpg',
        'description' => 'iPhone 11 in excellent condition. Battery health 89%. Original box included.'
    ],
    3 => [
        'name' => 'Accounting Textbook',
        'category' => 'Books',
        'seller' => 'Lerato Phiri',
        'price' => 350,
        'image' => 'textbook.jpg',
        'description' => 'Accounting textbook suitable for university students. Some highlighting inside but still in good condition.'
    ],
    4 => [
        'name' => 'Nike Sneakers',
        'category' => 'Fashion',
        'seller' => 'Jason N.',
        'price' => 800,
        'image' => 'sneakers.jpg',
        'description' => 'Nike sneakers in good condition. Comfortable and suitable for casual wear.'
    ],
    5 => [
        'name' => 'Study Desk',
        'category' => 'Furniture',
        'seller' => 'Naledi S.',
        'price' => 1200,
        'image' => 'desk.jpg',
        'description' => 'Study desk suitable for students. Strong and spacious enough for books, laptop, and stationery.'
    ],
    6 => [
        'name' => 'Bluetooth Speaker',
        'category' => 'Electronics',
        'seller' => 'Musa D.',
        'price' => 450,
        'image' => 'speaker.jpg',
        'description' => 'Portable Bluetooth speaker with clear sound and good battery life.'
    ],
    7 => [
        'name' => 'Scientific Calculator',
        'category' => 'Stationery',
        'seller' => 'Taiwo A.',
        'price' => 300,
        'image' => 'calculator.jpg',
        'description' => 'Scientific calculator suitable for university mathematics, accounting, science, and engineering modules.'
    ],
    8 => [
        'name' => 'Backpack',
        'category' => 'Fashion',
        'seller' => 'Karabo M.',
        'price' => 250,
        'image' => 'backpack.jpg',
        'description' => 'Durable backpack with enough space for books, laptop, and daily campus items.'
    ],
    9 => [
        'name' => 'Microwave Oven',
        'category' => 'Appliances',
        'seller' => 'Sipho Z.',
        'price' => 900,
        'image' => 'microwave.jpg',
        'description' => 'Microwave oven in working condition. Suitable for student accommodation or home use.'
    ],
    10 => [
        'name' => 'Office Chair',
        'category' => 'Furniture',
        'seller' => 'Bianca L.',
        'price' => 750,
        'image' => 'chair.jpg',
        'description' => 'Comfortable office chair suitable for studying or working from home.'
    ],
    11 => [
        'name' => 'Hair Dryer',
        'category' => 'Appliances',
        'seller' => 'Amanda T.',
        'price' => 400,
        'image' => 'hairdryer.jpg',
        'description' => 'Hair dryer in good condition. Works well and is easy to carry.'
    ],
    12 => [
        'name' => 'Graphic Design Tablet',
        'category' => 'Electronics',
        'seller' => 'Ethan R.',
        'price' => 1600,
        'image' => 'tablet.jpg',
        'description' => 'Graphic design tablet for drawing, editing, and creative projects.'
    ],
    13 => [
        'name' => 'Medical Terminology Book',
        'category' => 'Books',
        'seller' => 'Palesa G.',
        'price' => 500,
        'image' => 'medical-book.jpg',
        'description' => 'Medical terminology book suitable for health sciences students.'
    ],
    14 => [
        'name' => 'Soccer Boots',
        'category' => 'Sports',
        'seller' => 'Daniel M.',
        'price' => 650,
        'image' => 'boots.jpg',
        'description' => 'Soccer boots in good condition. Suitable for training and matches.'
    ],
    15 => [
        'name' => 'Ring Light',
        'category' => 'Electronics',
        'seller' => 'Zinhle B.',
        'price' => 550,
        'image' => 'ringlight.jpg',
        'description' => 'Ring light suitable for content creation, online classes, and video calls.'
    ]
];

$product = $products[$id] ?? $products[1];
?>

<section class="container py-5">
    <div class="row g-5 align-items-start">
        <div class="col-md-6">
            <div class="product-card p-3">
                <img 
                    src="/assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                    class="product-img" 
                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                    style="height: 380px;"
                >
            </div>
        </div>

        <div class="col-md-6">
            <span class="badge bg-primary mb-3">
                <?php echo htmlspecialchars($product['category']); ?>
            </span>

            <h1 class="section-title">
                <?php echo htmlspecialchars($product['name']); ?>
            </h1>

            <h3 class="text-primary mb-4">
                R<?php echo number_format($product['price'], 2); ?>
            </h3>

            <p class="lead">
                <?php echo htmlspecialchars($product['description']); ?>
            </p>

            <p class="text-muted">
                Seller: <?php echo htmlspecialchars($product['seller']); ?>
            </p>

            <div class="d-flex gap-2 mt-4">
                <a 
                    href="/add-to-cart.php?id=<?php echo $id; ?>" 
                    class="btn btn-primary btn-lg"
                >
                    Add to Cart
                </a>

                <a 
                    href="/products.php" 
                    class="btn btn-outline-secondary btn-lg"
                >
                    Back to Products
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
