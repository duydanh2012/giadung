<?php

namespace Platform\Products\Repositories\Eloquent;

use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;
use Platform\Products\Repositories\Interfaces\ProductsInterface;
use Platform\Base\Enums\BaseStatusEnum;

class ProductsRepository extends RepositoriesAbstract implements ProductsInterface
{
    /**
     * {@inheritDoc}
     */
    public function getNewProduct(int $limit = 6)
    {
        $data = $this->model
            ->where([
                'status'  => BaseStatusEnum::PUBLISHED,
            ])
            // ->whereNull('partner')
            ->limit($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('order');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getListProduct()
    {
        $data = $this->model
            ->where([
                'status'  => BaseStatusEnum::PUBLISHED,
            ])
            // ->whereNotNull('partner')
            ->orderBy('created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
