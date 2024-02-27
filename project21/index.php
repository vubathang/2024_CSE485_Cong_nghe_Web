<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once "Db.php";
$itemsPerPage = 9;
$currentPage = !isset($_GET['page']) ? 1 : $_GET['page'];
if (isset($products)) {
    $totalPages = ceil(count($products) / $itemsPerPage);
    $currentPageItems = array_slice($products, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
}
?>
<h2 class="text-center text-success m-3">Products</h2>
<div class="product-list d-flex justify-content-center text-center flex-wrap">
    <?php if (isset($currentPageItems)) {
        foreach ($currentPageItems as $products): ?>
           <div class="product col-3" id="<?= $products['id']?>">
               <img src="<?= $products['img']?>" alt="<?=$products['name']?>" style="width: 200px;">
               <h3><?= $products['name']?></h3>
               <p><?= $products['price']?>$</p>
               <p><?=$products['desc']?></p>
           </div>
        <?php endforeach;
    } ?>
</div>

<div class="pagination d-flex justify-content-center m-3">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php if (isset($totalPages)) {
        for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i == $currentPage): ?>
                <span class="active"><?php echo $i; ?></span>
            <?php else: ?>
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor;
    } ?>

    <?php if (isset($totalPages)) {
        if ($currentPage < $totalPages): ?>
            <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
        <?php endif;
    } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>