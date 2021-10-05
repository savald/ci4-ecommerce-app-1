<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UsersModel;

class User extends BaseController
{
  protected $userModel;
  protected $productModel;

  public function __construct()
  {
    $this->productModel = new ProductModel();
    $this->userModel = new UsersModel();
  }

  public function index()
  {
    $data['products'] = $this->productModel->get()->getResultArray();
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
