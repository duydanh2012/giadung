<?php

namespace Platform\Products\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Products\Repositories\Interfaces\ProductsInterface;

class ProductsCacheDecorator extends CacheAbstractDecorator implements ProductsInterface
{
    /**
     * {@inheritDoc}
     */
    public function getNewProduct(int $limit = 6)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getListProduct()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}