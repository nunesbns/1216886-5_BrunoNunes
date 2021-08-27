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
        return (reset($path) === $slug) ? 'active bg-primary text-light' : '';
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

if (!function_exists('get_product_image')) {
    /**
     * Get first image from product images array
     * @param array $product
     * @return string
     */
    function get_product_image(array $product): string
    {
        return 'images/' . $product['id'] . '/' . reset($product['images']);
    }
}

if (!function_exists('paginate')) {
    /**
     * Paginate given items
     * @param array $items
     * @param int $items_per_page
     * @return array
     */
    function paginate(array $items, int $items_per_page): array
    {
        $page = ($_GET['page']) ?? 1;
        $limit = $items_per_page;
        $total_pages = ceil(count($items) / $limit);
        $page = max($page, 1);
        $page = min($page, $total_pages);
        $offset = ($page - 1) * $limit;
        $items = array_slice($items, $offset, $limit);
        return [$items, $total_pages];
    }
}


if (!function_exists('float_to_currency')) {
    /**
     * Parse float value to currency
     * @param $float
     * @return string
     */
    function float_to_currency($float): string
    {
        return 'R$ ' . number_format($float, 2, ',', '.');
    }
}

if (!function_exists('get_product_by_id')) {
    /**
     * Get a product by id
     * @param $id
     * @return mixed
     */
    function get_product_by_id($id): array
    {
        $products = include('dados/products.php');

        $product = array_filter($products, function ($item) use ($id) {
            return str_contains($item['id'], $id);
        });

        return reset($product);
    }
}

if (!function_exists('get_text_cart')) {

    /**
     * Return cart items in string format
     * @param $cart
     * @return string
     */
    function get_text_cart($cart): string
    {
        $total_cart = 0;
        $text = "Olá, gostaria de encomendar o pedido abaixo:%0a%0a";
        foreach ($cart as $item) {
            $product = get_product_by_id($item['productId']);
            $total = (float)$item['clientOrder'] * $product['price'];
            $total_cart += $total;

            $text .= (float)$item['clientOrder'] . " un. ". $product['title'] . " - " . float_to_currency($total) . "%0a";
        }
        $text .= "TOTAL: " . float_to_currency($total_cart);

        return $text;
    }
}

if (!function_exists('format_phone')) {

    /**
     * Return formatted phone
     * @param $phone
     * @return string
     */
    function format_phone($phone): string
    {
        $formatted_phone = preg_replace('/[^0-9]/', '', substr($phone, 2));
        $matches = [];
        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatted_phone, $matches);
        if ($matches) {
            return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
        }

        return $formatted_phone;
    }
}
