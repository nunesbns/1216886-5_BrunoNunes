<?php

if (!function_exists('is_link_active')) {
    /**
     * Verify if current link is active
     * @param $path
     * @param $slug
     * @return string
     */
    function is_link_active($path, $slug): string
    {
        return (reset($path) === $slug) ? 'active' : '';
    }
}

if (!function_exists('filter_products')) {
    /**
     * Filter product by title
     * @param array $products
     * @return array
     */
    function filter_products(array $products): array
    {
        $needle = ($_GET['s']) ?? null;
        if ($needle) {
            $needle = strtolower(sanitize_string($needle));
            $products = array_filter($products, function ($item) use ($needle) {
                $title = strtolower(sanitize_string($item['title']));
                return str_contains($title, $needle);
            });
        }

        return $products;
    }
}


if (!function_exists('sanitize_string')) {
    /**
     * Sanitize given string
     * @param string $string
     * @return string
     */
    function sanitize_string(string $string): string
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
}