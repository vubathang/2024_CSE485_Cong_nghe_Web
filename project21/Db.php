<?php
    $products = [
        [
            "id" => 1,
            "name" => "Desk",
            "price" => 62.99,
            "description" => "27.56'' Desk by East Urban Home",
            "image" => "assets/image/Desk.webp"
        ],
        [
            "id" => 2,
            "name" => "Chair",
            "price" => 295.00,
            "description" => "Dan Rattan Folding Dining Chair (Set of 2) by AllModern",
            "image" => "assets/image/Chair.webp"
        ],
        // ... add more products
        [
            "id" => 3,
            "name" => "Shoes",
            "price" => 31.35,
            "description" => "Comfortable Loafer Shoes",
            "image" => "assets/image/shoes.avif"
        ],
        [
            "id" => 4,
            "name" => "Radio Bluetooth",
            "price" => 99.07,
            "description" => "Decorative Radio with Bluetooth",
            "image" => "assets/image/RadioBluetooth.webp"
        ],
        [
            "id" => 5,
            "name" => "Painting",
            "price" => 31.99,
            "description" => "Chickadees And Pussy Willow On Canvas Painting",
            "image" => "assets/image/Painting.webp"
        ],
        [
            "id" => 6,
            "name" => "Dress",
            "price" => 23.15,
            "description" => "Comfortable dress for outdoor activities",
            "image" => "assets/image/dress.jpg"
        ],

        [
            "id" => 7,
            "name" => "Sweater",
            "price" => 12.18,
            "description" => "Super Stretch Long Sleeve Sweatshirt",
            "image" => "assets/image/sweater.avif"
        ],
    ];
    $itemsPerPage = 4;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalPages = ceil(count($products) / $itemsPerPage);
    $currentPageItems = array_slice($products, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>
<!---->
<!--class Db-->
<!--{-->
<!---->
<!--}-->