<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Checkout extends BaseController
{

  public function index()
  {

    $totalPrice = $this->checkoutModel->select('total_price')->find(session()->get('checkout_id'));

    $data = [
      'title' => 'Checkout',
      'user' => $this->userModel->select('id, name, phone_num, address')->find(session()->get('user_id')),
      'total_price' => $totalPrice['total_price'],
      'products_cart' => $this->cartModel->getCartsUser(session()->get('user_id')),
    ];
    // dd($data); 

    session()->remove('checkout_id');
    return view('product/checkout', $data);
  }

  public function checkout()
  {
    $productId = $this->request->getVar('product_id');
    $quantity = $this->request->getVar('quantity');
    $totalPrice = $this->request->getVar('total_price');
    $countCart = $this->cartModel->getCountCarts(session()->get('user_id'));

    $checkouts = [
      'user_id' => session()->get('user_id'),
      'total_order' => array_sum($quantity),
      'total_price' => $totalPrice,
      // 'order_date' => ''
    ];
    // dd($checkouts);

    $this->checkoutModel->insert($checkouts);
    session()->set(['checkout_id' => $this->checkoutModel->insertID()]);

    $checkoutDetails = [];
    for ($i = 0; $i < count($productId); $i++) {
      $details = [
        'checkout_id' => $this->checkoutModel->insertID(),
        'product_id' => $productId[$i],
        'quantity' => $quantity[$i]
      ];
      $checkoutDetails[] = $details;
    }

    $this->checkoutDetailModel->insertBatch($checkoutDetails);

    return redirect()->to('checkout');
  }

  public function order()
  {

    $checkoutId = $this->checkoutModel->insertID();
    dd($checkoutId);

    // $checkoutDetails = [
    //   'checkout_id' => $this->checkoutModel->insertID(),
    //   // 'product_id' =>
    // ];

    // $this->checkoutDetailModel->insert($checkoutDetails);

    // dd($checkouts);

  }
}
