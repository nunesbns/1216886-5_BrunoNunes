<?php

$page_title = "Doces Caseiros";

require('pages/parts/header.php');
include('pages/parts/search-bar.php');

$products = filter_products(include('dados/products.php'));
[$products, $total_pages] = paginate($products, $app['products_per_page']);

if (!empty($_GET['s'])):
    ?>
    <div class="row pt-5">
        <div class="col">
            <h2 class="text-center">Resultados para: <?= sanitize_string($_GET['s']) ?></h2>
        </div>
    </div>
<?php endif; ?>


    <div class="row py-5">
        <?php
        if($products):
        foreach ($products as $product) {
            include('pages/parts/product-card.php');
        }
        else:
        ?>
            <div class="col text-center">
                <span class="alert alert-info">Nenhum produto encontrado<span>
            </div>
        <?php endif;?>
    </div>

<?php
require('pages/parts/footer.php');
