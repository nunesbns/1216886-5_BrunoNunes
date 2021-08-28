<?php
require_once('function/helper.php');
$product = get_current_product();

$page_title = $product['title'];

require('pages/parts/header.php');
?>
<div class="row">
    <div class="col">
        <?php include('pages/parts/product-carousel.php');?>
    </div>
    <div class="col">
        <p class="card-text"><?= $product['description'] ?></p>
        <p class="text-primary"><strong><?= float_to_currency($product['price']) ?> /un.</strong></p>
        <input class="d-inline w-25 form-control" type="number" id="product-order-<?=$product['id']?>" value="<?= $product['min_order'] ?>">
        <button class="btn btn-primary" onclick="addToCart(<?=$product['id']?>,<?= $product['min_order'] ?>)">+ Carrinho</button>
    </div>
</div>
<?php

require('pages/parts/footer.php');