<?php

$page_title = "Quem somos";
$about_us = include "dados/about-us.php";

require('pages/parts/header.php');
?>

    <div class="row">
        <div class="col">
            <img src="<?= $about_us['image'] ?>">
        </div>
        <div class="col">
            <?= $about_us["about"] ?>
        </div>
    </div>

<?php
require('pages/parts/footer.php');