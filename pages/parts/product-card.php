<div class="col-md-6 col-lg-4">
    <div class="card my-2">
        <div class="product-img" style="background-image:url('<?= get_product_image($product) ?>')"></div>
        <div class="card-body">
            <h5 class="card-title"><?= $product['title'] ?></h5>
            <p class="card-text"><?= $product['description'] ?></p>
            <p class="text-primary"><strong><?= float_to_currency($product['price']) ?> /un.</strong></p>
            <input class="d-inline w-25 form-control" type="number" id="product-order-<?=$product['id']?>" value="<?= $product['min_order'] ?>">
            <button class="btn btn-primary" onclick="addToCart(<?=$product['id']?>,<?= $product['min_order'] ?>)">+ Carrinho</button>
            <a href="/produto/<?= $product['slug'] ?>" class="btn btn-secondary">+ Detalhes</a>
        </div>
    </div>
</div>