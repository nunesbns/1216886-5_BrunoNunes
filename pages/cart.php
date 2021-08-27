<?php

$page_title = "Carrinho";


require('pages/parts/header.php');

if (!$cart):
    ?>
    <div class="col text-center mt-5">
                <span class="alert alert-info"><i class="far fa-sad-tear"></i> Seu carrinho está vazio.<span>
    </div>
<?php
else:
    ?>
    <table id="cart" class="table table-striped text-center">
        <tr>
            <th scope="col">Quantidade</th>
            <th scope="col">Produto</th>
            <th scope="col">Valor unitário</th>
            <th scope="col">Valor total</th>
            <th scope="col">Remover</th>
        </tr>

        <?php
        $total_cart = 0;

        foreach ($cart as $item):
            $product = get_product_by_id($item['productId']);
            $total = (float)$item['clientOrder'] * $product['price'];
            $total_cart += $total;
            ?>
            <tr id="cart-product-<?=$item['productId']?>">
                <td><?= (int)$item['clientOrder'] ?></td>
                <td><?= $product['title'] ?></td>
                <td><?= float_to_currency($product['price']) ?></td>
                <td><?= float_to_currency($total); ?></td>
                <td><button class="btn btn-primary" onclick="removeFromCart(<?=$item['productId']?>)"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="row">
        <div class="col">
            <p class="text-center h2"><strong>Total: </strong><span
                        class="text-primary"><?= float_to_currency($total_cart) ?></span></p>
        </div>
    </div>

    <div class="row p-5 bg-light">
        <div class="col text-center">
            <h3 class="text-center">Encomendar</h3>
            <a class="btn btn-lg btn-success" href="https://wa.me/<?=$contact['whatsapp']?>?text=<?=get_text_cart($cart)?>"><i class="fab fa-whatsapp"></i></a>
            <a class="btn btn-lg btn-secondary" href="mailto:<?=$contact['email']?>?subject=Encomenda de doces&body=<?=get_text_cart($cart)?>"><i class="fas fa-envelope"></i></a>
        </div>
    </div>
<?php
endif;

require('pages/parts/footer.php');