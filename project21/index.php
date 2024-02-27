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
include_once "db.php";
$itemsPerPage = 3;
$currentPage = !isset($_GET['page']) ? 1 : $_GET['page'];
if (isset($products)) {
    $totalPages = ceil(count($products) / $itemsPerPage);
    $currentPageItems = array_slice($products, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
}
?>
<div class="d-flex justify-content-center">
    <?php if (isset($currentPageItems)) {
        foreach ($currentPageItems as $products): ?>
            <div class="product col-md-3 card m-2 text-center" id="<?= $products['id']?>">
                <div class="d-flex justify-content-center">
                    <img src="<?= $products['img']?>" alt="<?=$products['name']?>" style="width: 200px; height: 400px;">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?= $products['name']?></h4>
                    <h5 class="card-text text-danger"><?= $products['price']?>$</h5>
                    <p class="card-text"><?=$products['desc']?></p>
                    <a href="#" class="btn btn-success card-link">Buy</a>
                </div>
            </div>
        <?php endforeach;
    } ?>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-3">
        <li class="page-item">
            <?php if ($currentPage > 1): ?>
                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
            <?php endif; ?>
        </li>
        <?php if (isset($totalPages)) {
            for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $currentPage): ?>
                    <li class="page-item active">
                        <span class="page-link active"><?php echo $i; ?></span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endif; ?>
            <?php endfor;
        } ?>
        <li class="page-item">
            <?php if (isset($totalPages)) {
                if ($currentPage < $totalPages): ?>
                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a>
                <?php endif;
            } ?>
        </li>
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>