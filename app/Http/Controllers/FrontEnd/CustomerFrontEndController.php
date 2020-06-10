<?php 

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepositoryInterface as ProductInterface;
use App\Repositories\OrderRepositoryInterface as OrderInterface;

class CustomerFrontEndController extends Controller
{
    private $productRepository;
    private $orderRepository;

    public function __construct(ProductInterface $productRepository, OrderInterface $orderRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function allProduct()
    {
        $product = $this->productRepository->findAll();

        return view('frontoffice.product', compact('product'));
    }

    public function productInfo($id)
    {
        $order_info = $this->productRepository->findOne($id);

        return view('frontoffice.order', compact('order_info'));
    }
}