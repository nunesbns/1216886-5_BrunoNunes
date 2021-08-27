<?php
$cart = isset($_COOKIE['bacandy_cart']) ? json_decode($_COOKIE['bacandy_cart'], true) : false;

$app = include('dados/app.php');
$menu = include('dados/menu.php');
$contact = include "dados/contact.php";

require('function/helper.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?= $page_title . " | " . $app['site_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    <link href="/css/style.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light ">
    <div class="container-md px-5">
        <a class="navbar-brand text-primary" href="/"><i class="fas fa-store"></i> <?= $app['site_name'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-lg-5">
                <?php
                foreach ($menu as $item):
                    ?>
                    <a class="nav-link <?= is_link_active($path, $item['slug']) ?>  <?php if(array_key_exists('class', $item))echo $item['class'];?>"
                       href="/<?= $item['slug'] ?>">
                        <?php if(array_key_exists('cart_count', $item) && $item['cart_count'] > 0)echo $item['cart_count'];?>
                        <?php if(array_key_exists('icon', $item))echo $item['icon'];?>
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</nav>
<div class="container-md p-5">
    <div class="row">
        <div class="col pb-3">
            <h1 class="text-center text-primary"><?= $page_title ?></h1>
        </div>
    </div>
