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
            <a class="btn btn-lg btn-success" href="https://wa.me/<?= $contact['whatsapp'] ?>"><i
                        class="fab fa-whatsapp"></i></a>
            <a class="btn btn-lg btn-secondary" href="mailto:<?= $contact['email'] ?>"><i
                        class="fas fa-envelope"></i></a>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script>
        // MAPS
        let map = L.map('mapid').setView([-15.800638226809617, -47.89369674456748], 13);
        let marker = L.marker([-15.800638226809617, -47.89369674456748]).addTo(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        }).addTo(map);
    </script>
<?php
require('pages/parts/footer.php');