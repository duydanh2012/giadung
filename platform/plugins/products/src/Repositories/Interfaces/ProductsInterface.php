<?php

namespace Platform\Products\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ProductsInterface extends RepositoryInterface
{
    /**
     * @param int $limit
     * @return mixed
     */
    public function getNewProduct(int $limit = 6);
    
    /**
     * @return mixed
     */
    public function getListProduct();
}