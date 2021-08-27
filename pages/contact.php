<?php

$page_title = "Contato";

require('pages/parts/header.php');
?>
<div class="row">
    <div class="col">
        <div id="mapid"></div>
    </div>
</div>

    <div class="row p-5">
        <div class="col text-center">
            <h4 class="text-center">Endereço</h4>
            <p><?= $contact["address"] ?></p>

            <h4 class="text-center">Telefone</h4>
            <p><?= format_phone($contact["whatsapp"]) ?></p>

            <h4 class="text-center">E-mail</h4>
            <p><?= $contact["email"] ?></p>

        </div>

        <div class="col text-center">
            <h4 class="text-center">Mande uma mensagem</h4>
            <a class="btn btn-lg btn-success" href="https://wa.me/<?=$contact['whatsapp']?>"><i class="fab fa-whatsapp"></i></a>
            <a class="btn btn-lg btn-secondary" href="mailto:<?=$contact['email']?>"><i class="fas fa-envelope"></i></a>
        </div>
    </div>
<?php
require('pages/parts/footer.php');