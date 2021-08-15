<?php

if(!function_exists('load_content')) {
    /**
     * Load content according to uri
     */
    function load_content(){
        $uri = $_SERVER["REQUEST_URI"];
        $path = array_filter(explode('/', $uri)) ?: ['home'];

        switch (reset($path)) {
            case 'home':
                include_once('pages/index.php');
                break;
            case 'quem-somos':
                include_once('pages/page.php');
                break;
            case 'contato':
                include_once('pages/contato.php');
                break;
            case 'produto':
                include_once('pages/single.php');
                break;
            default: include_once('pages/404.php');
        }
    }
}