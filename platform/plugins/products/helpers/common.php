<?php

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Products\Repositories\Interfaces\ProductsInterface;

if (!function_exists('get_list_products')) {
    /**
     * @return array
     */
    function get_list_products()
    {
        return app(ProductsInterface::class)->getListProduct();
    }
}

if (!function_exists('get_new_products')) {
    /**
     * @return array
     */
    function get_new_products()
    {
        return app(ProductsInterface::class)->getNewProduct();
    }
}