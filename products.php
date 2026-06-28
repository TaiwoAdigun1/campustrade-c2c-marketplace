<?php require_once 'includes/header.php'; ?>

<section class="container py-5">
    <h1 class="section-title mb-4">Products</h1>

    <form class="row g-2 mb-4">
        <div class="col-md-6">
            <input class="form-control" placeholder="Search products">
        </div>

        <div class="col-md-4">
            <select class="form-select">
                <option>All categories</option>
                <option>Electronics</option>
                <option>Books</option>
                <option>Fashion</option>
                <option>Furniture</option>
                <option>Appliances</option>
                <option>Sports</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100" type="button">Filter</button>
        </div>
    </form>

    <div class="row g-4">

        <?php
        $products = [
            ['Dell Latitude Laptop', 'Electronics', 'Thabo Mokoena', 4500, 'laptop.jpg'],
            ['iPhone 11 64GB', 'Electronics', 'Ayesha Khan', 5200, 'iphone.jpg'],
            ['Accounting Textbook', 'Books', 'Lerato Phiri', 350, 'textbook.jpg'],
            ['Nike Sneakers', 'Fashion', 'Jason N.', 800, 'sneakers.jpg'],
            ['Study Desk', 'Furniture', 'Naledi S.', 1200, 'desk.jpg'],
            ['Bluetooth Speaker', 'Electronics', 'Musa D.', 450, 'speaker.jpg'],
            ['Scientific Calculator', 'Stationery', 'Taiwo A.', 300, 'calculator.jpg'],
            ['Backpack', 'Fashion', 'Karabo M.', 250, 'backpack.jpg'],
            ['Microwave Oven', 'Appliances', 'Sipho Z.', 900, 'microwave.jpg'],
            ['Office Chair', 'Furniture', 'Bianca L.', 750, 'chair.jpg'],
            ['Hair Dryer', 'Appliances', 'Amanda T.', 400, 'hairdryer.jpg'],
            ['Graphic Design Tablet', 'Electronics', 'Ethan R.', 1600, 'tablet.jpg'],
            ['Medical Terminology Book', 'Books', 'Palesa G.', 500, 'medical-book.jpg'],
            ['Soccer Boots', 'Sports', 'Daniel M.', 650, 'boots.jpg'],
            ['Ring Light', 'Electronics', 'Zinhle B.', 550, 'ringlight.jpg']
        ];

        foreach ($products as $index => $p):
        ?>

            <div class="col-md-4">
                <div class="product-card">
                    <img 
                        src="/assets/images/<?php echo $p[4]; ?>" 
                        class="product-img" 
                        alt="<?php echo htmlspecialchars($p[0]); ?>"
                    >

                    <div class="p-3">
                        <span class="badge bg-primary mb-2">
                            <?php echo htmlspecialchars($p[1]); ?>
                        </span>

                        <h5><?php echo htmlspecialchars($p[0]); ?></h5>

                        <p class="text-muted mb-1">
                            Seller: <?php echo htmlspecialchars($p[2]); ?>
                        </p>

                        <p class="fw-bold">
                            R<?php echo number_format($p[3], 2); ?>
                        </p>

                        <a 
                            href="/product-details.php?id=<?php echo $index + 1; ?>" 
                            class="btn btn-primary w-100"
                        >
                            View Product
                        </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
