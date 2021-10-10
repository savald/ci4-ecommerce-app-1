<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;

class Carts extends BaseController
{
    protected $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $user_id = session()->get('user_id');
        $data = [
            'title' => 'My Cart',
            'productCarts' => $this->cartModel->getCartsUser($user_id),
            'products' => $this->productModel->get()->getResultArray()
        ];
        // dd($data);
        return view('product/carts', $data);
    }

    public function add_cart()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'user_id' => session()->get('user_id'),
                'product_id' => $this->request->getPost('product_id'),
                'category_id' => $this->request->getPost('category_id'),
            ];

            $this->cartModel->insert($data);
            // return redirect()->back();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }
}
