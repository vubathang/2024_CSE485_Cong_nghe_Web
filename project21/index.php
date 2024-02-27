<?php
require 'Db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="">
    <div class="product-list">
        <?php foreach ($currentPageItems as $product): ?>
            <div class="card ms-4 mt-3" style="width: 18rem; height: 300px">
<!--                <div class="content mx-auto">-->
                    <img src="<?php echo $product['image']; ?>" class="card-img-top " alt="<?php echo $product['name']; ?>">
                    <div class="card-body ">
    <!--                    <h5 class="card-title">--><?php //echo $product['name']; ?><!--</h5>-->
                        <p class="card-title"><?php echo $product['description']; ?></p>
                        <p class="card-text"><strong>$<?php echo $product['price']; ?></strong></p>

                    </div>

<!--                </div>-->
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination ms-4">
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