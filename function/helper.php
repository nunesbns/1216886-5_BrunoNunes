<?php

if(!function_exists('is_link_active')) {
    /**
     * Verify if current link is active
     * @param $path
     * @param $slug
     * @return string
     */
    function is_link_active($path, $slug): string
    {
        return (reset($path) === $slug) ? 'active':'';
    }
}