<?php

return [
    [
        'label' => 'Home',
        'slug' => 'home'
    ],
    [
        'label' => 'Quem somos',
        'slug' => 'quem-somos'
    ],
    [
        'label' => 'Contato',
        'slug' => 'contato'
    ],
    [
        'label' => 'Carrinho',
        'slug' => 'carrinho',
        'icon' => '<i class="fas fa-shopping-cart"></i>',
        'class' => 'text-primary',
        'cart_count' => count($cart)
    ]
];