<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Carts extends BaseController
{

  public function index()
  {
    $user_id = session()->get('user_id');
    $data = [
      'title' => 'My Cart',
      'cartModel' => $this->cartModel,
      'productCarts' => $this->cartModel->getCartsUser($user_id),
      'products' => $this->productModel->get()->getResultArray()
    ];
    // dd($data);
    return view('product/carts', $data);
  }

  public function add_cart()
  {
    if ($this->request->isAJAX()) {
      $userId = $this->request->getVar('user_id');
      $productId = $this->request->getVar('product_id');
      $categorytId = $this->request->getVar('category_id');
      $cartTable = $this->cartModel->where('user_id', $userId)->findColumn('product_id') ?? [];

      if (!in_array($productId, $cartTable)) {
        // if user has been logged in return true
        if ($userId != 0) {
          $data = [
            'user_id' => $userId,
            'product_id' => $productId,
            'category_id' => $categorytId,
          ];

          $this->cartModel->insert($data);
          $output = [
            'status' => true,
            'table' => 'carts'
          ];
          return json_encode($output);
        }
      }

      // if user hasn't logged in return false
      return json_encode(['status' => false]);
    } else {
      throw PageNotFoundException::forPageNotFound();
    };
  }

  public function delete_cart()
  {
    if ($this->request->isAJAX()) {

      $userId = $this->request->getVar('user_id');
      $productId = $this->request->getVar('product_id');
      $categorytId = $this->request->getVar('category_id');

      $this->cartModel
        ->where('user_id', $userId)
        ->where('product_id', $productId)
        ->where('category_id', $categorytId)
        ->delete();

      $output = [
        'status' => true,
        'table' => 'carts'
      ];

      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function get_my_carts()
  {
    if ($this->request->isAJAX()) {
      $user_id = session()->get('user_id');

      $data['productCarts'] = $this->cartModel->getCartsUser($user_id);

      $output = view('partials/my-carts', $data);
      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    };
  }

  public function get_count_cart()
  {
    if ($this->request->isAJAX()) {
      $user_id = session()->get('user_id');
      $data = $this->cartModel->getCountCarts($user_id);
      return json_encode($data);
    } else {
      throw PageNotFoundException::forPageNotFound();
    };
  }
}
