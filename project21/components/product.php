
<?php function getCard($id, $name, $price, $thumb) {
    $formattedPrice = number_format($price, 0, ',', '.');
?>
    <div class="col-md-4 col-sm-6 col-12" id="product-<?=$id?>">
        <div class="card shadow product-box position-relative border p-3">
            <img class="img-fluid" src="assets/image/<?=$thumb?>" alt="image">
            <div class="content">
                <h4><b><?=$name?></b></h4>
                <p><?=$formattedPrice?><sup>đ</sup></p>
            </div>
            <button class="btn btn-success shadow">Add to cart</button>
        </div>
    </div>
<?php }?>