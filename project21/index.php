<?php
require 'Db.php';
require 'components/product.php';
$itemsPerPage = 6;
session_start();
$currentPage = isset($_GET['page']) ? $_GET['page'] : (isset($_SESSION['currentPage']) ? $_SESSION['currentPage'] : 1);
$_SESSION['currentPage'] = $currentPage;
$totalPages = isset($products) ? ceil(count($products) / $itemsPerPage) : 6;
$currentPageItems = array_slice($products, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Thực hành 2.1</title>
</head>
<body>
    <div class="container my-5">
        <div class="product-list row g-3 g-lg-4">
            <?php foreach ($currentPageItems as $product) {
                getCard($product['id'], $product['name'], $product['price'], $product['thumb']);
            } ?>
        </div>
        <div class="pagination mt-5">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $currentPage): ?>
                    <span class="active"><?php echo $i; ?></span>
                <?php else: ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>