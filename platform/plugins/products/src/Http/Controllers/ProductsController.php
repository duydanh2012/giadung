<?php

namespace Platform\Products\Http\Controllers;

use Platform\Base\Events\BeforeEditContentEvent;
use Platform\Products\Http\Requests\ProductsRequest;
use Platform\Products\Repositories\Interfaces\ProductsInterface;
use Platform\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Platform\Products\Tables\ProductsTable;
use Platform\Base\Events\CreatedContentEvent;
use Platform\Base\Events\DeletedContentEvent;
use Platform\Base\Events\UpdatedContentEvent;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\Products\Forms\ProductsForm;
use Platform\Base\Forms\FormBuilder;

class ProductsController extends BaseController
{
    /**
     * @var ProductsInterface
     */
    protected $productsRepository;

    /**
     * @param ProductsInterface $productsRepository
     */
    public function __construct(ProductsInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    /**
     * @param ProductsTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ProductsTable $table)
    {
        page_title()->setTitle(trans('plugins/products::products.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/products::products.create'));

        return $formBuilder->create(ProductsForm::class)->renderForm();
    }

    /**
     * @param ProductsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(ProductsRequest $request, BaseHttpResponse $response)
    {
        $products = $this->productsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PRODUCTS_MODULE_SCREEN_NAME, $request, $products));

        return $response
            ->setPreviousUrl(route('products.index'))
            ->setNextUrl(route('products.edit', $products->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $products = $this->productsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $products));

        page_title()->setTitle(trans('plugins/products::products.edit') . ' "' . $products->name . '"');

        return $formBuilder->create(ProductsForm::class, ['model' => $products])->renderForm();
    }

    /**
     * @param int $id
     * @param ProductsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, ProductsRequest $request, BaseHttpResponse $response)
    {
        $products = $this->productsRepository->findOrFail($id);

        $products->fill($request->input());

        $products = $this->productsRepository->createOrUpdate($products);

        event(new UpdatedContentEvent(PRODUCTS_MODULE_SCREEN_NAME, $request, $products));

        return $response
            ->setPreviousUrl(route('products.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $products = $this->productsRepository->findOrFail($id);

            $this->productsRepository->delete($products);

            event(new DeletedContentEvent(PRODUCTS_MODULE_SCREEN_NAME, $request, $products));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $products = $this->productsRepository->findOrFail($id);
            $this->productsRepository->delete($products);
            event(new DeletedContentEvent(PRODUCTS_MODULE_SCREEN_NAME, $request, $products));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
