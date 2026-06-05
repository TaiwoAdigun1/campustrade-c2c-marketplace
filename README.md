# CampusTrade C2C Marketplace

CampusTrade is a Consumer-to-Consumer e-commerce system built with HTML, CSS, Bootstrap, JavaScript, PHP and MySQL.

## Demo Accounts

All demo passwords: `Admin123!`

- Admin: admin@campustrade.co.za
- Seller: seller@campustrade.co.za
- Customer: customer@campustrade.co.za

## Local Setup with XAMPP

1. Install XAMPP.
2. Copy the `campustrade` folder into `xampp/htdocs/`.
3. Start Apache and MySQL.
4. Open phpMyAdmin.
5. Import `database/campustrade.sql`.
6. Open `http://localhost/campustrade/index.php`.

## Hosting Setup

1. Create a free PHP and MySQL hosting account, for example InfinityFree or AwardSpace.
2. Create a MySQL database in the hosting control panel.
3. Import `database/campustrade.sql` into the online phpMyAdmin.
4. Upload all project files into `htdocs` or `public_html`.
5. Edit `includes/db.php` and replace host, username, password and database name with the online details.
6. Open your live website URL and test login, product listing, cart, checkout and admin pages.

## Admin Features

- Manage users
- Manage roles
- Manage products
- Manage categories
- Manage orders
- Role-Based Access Control
