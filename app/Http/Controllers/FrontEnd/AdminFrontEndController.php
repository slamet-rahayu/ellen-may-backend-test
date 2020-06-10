<?php 

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\UserRepositoryInterface as UserInterface;
use App\Repositories\ProductRepositoryInterface as ProductInterface;
use App\Repositories\OrderRepositoryInterface as OrderInterface;

class AdminFrontEndController extends Controller
{
    private $userRepository;
    private $productRepository;
    private $orderRepository;

    public function __construct(UserInterface $userRepository, ProductInterface $productRepository, OrderInterface $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function allProducts()
    {
      return view('backoffice.products');
    }

    public function allOrders()
    {
        return view('backoffice.orders');
    }

    public function allUsers()
    {
        return view('backoffice.users');
    }

    public function addProduct()
    {
        return view('backoffice.addproduct');
    }

    public function updateProduct($id)
    {
        $data = $this->productRepository->findOne($id);

        return view('backoffice.updateproduct', compact('data'));
    }

    public function updateOrder($id)
    {
        $data = $this->orderRepository->findOne($id);

        return view('backoffice.updateorder', compact('data'));
    }
    
    public function updateUser($id)
    {
        $data = $this->userRepository->findOne($id);

        return view('backoffice.updateuser', compact('data'));
    }
}