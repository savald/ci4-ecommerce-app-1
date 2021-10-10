<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\UsersModel;

class User extends BaseController
{
  protected $userModel;
  protected $productModel;
  protected $cartModel;

  public function __construct()
  {
    $this->cartModel = new CartModel();
    $this->productModel = new ProductModel();
    $this->userModel = new UsersModel();
  }

  public function index()
  {
    $user_id = session()->get('user_id');
    $data = [
      'title' => 'Let\'s Shop',
      'productCarts' => $this->cartModel->getCartsUser($user_id),
      'products' => $this->productModel->get()->getResultArray()
    ];
    shuffle($data['products']);
    // dd($data);
    return view('index', $data);
  }

  public function favorites()
  {
    return view('product/favorites');
  }

  public function profile()
  {
    return view('dashboard/index');
  }
}
