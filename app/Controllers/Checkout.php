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
    // dd($totalPrice);


    $checkouts = [
      'user_id' => session()->get('user_id'),
      'total_order' => array_sum($quantity),
      'total_price' => $totalPrice,
      // 'order_date' => ''
    ];

    $this->checkoutModel->insert($checkouts);

    session()->set(['checkout_id' => $this->checkoutModel->insertID()]);
    return redirect()->to('checkout');
  }

  public function order()
  {
    $checkouts = [
      'user_id' => session()->get('user_id'),
      'total_order' => $this->request->getVar('total_order'),
      'total_price' => $this->request->getVar('total_price'),
      // 'order_date' => ''
    ];

    // $this->checkoutModel->insert($checkouts);

    // $checkoutDetails = [
    //   'checkout_id' => $this->checkoutModel->insertID(),
    //   // 'product_id' =>
    // ];

    // $this->checkoutDetailModel->insert($checkoutDetails);

    // dd($checkouts);

  }
}
