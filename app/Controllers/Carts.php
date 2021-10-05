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
            'productCarts' => $this->cartModel->getCartsUser($user_id),
            'products' => $this->productModel->get()->getResultArray()
        ];

        return view('product/carts', $data);
    }

    public function addCart()
    {
        
    }
}
