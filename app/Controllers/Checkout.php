<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Checkout extends BaseController
{

  public function index()
  {
    $checkoutId = $this->checkoutModel->get()->getLastRow('array')['id'];
    $totalPrice = $this->checkoutModel->select('total_price')->find($checkoutId);

    $data = [
      'title' => 'Checkout',
      'user' => $this->userModel->select('id, name, phone_num, address')->find(session()->get('user_id')),
      'total_price' => $totalPrice['total_price'],
      'products_cart' => $this->cartModel->getCartsUser(session()->get('user_id')),
    ];

    return view('product/checkout', $data);
  }

  public function order()
  {
    $productId = $this->request->getVar('product_id');
    $quantity = $this->request->getVar('quantity');
    $totalPrice = $this->request->getVar('total_price');

    $checkouts = [
      'user_id' => session()->get('user_id'),
      'total_order' => array_sum($quantity),
      'total_price' => $totalPrice,
      'order_date' => date('Y-m-d H:i:s'),
      'deadline_payment' => date('Y-m-d H:i:s', strtotime('+1 day', strtotime(date('Y-m-d H:i:s')))),
    ];
    $this->checkoutModel->save($checkouts);

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

    $totalPrice = $this->checkoutModel->select('total_price')->find(session()->get('checkout_id'));

    return redirect()->to('/checkout');
  }

  public function place_order()
  {
    session()->remove('checkout_id');

    $lastCheckout = $this->checkoutModel->get()->getLastRow('array')['id'];

    $userId = sprintf("%02d", substr(session()->get('user_id'), -2));
    $checkoutId = sprintf("%02d", substr($lastCheckout, -2));
    $year = date('y');
    $month = date('m');
    $date = date('d');
    $invoiceId = sprintf("%07d", $lastCheckout);

    $data = [
      'id' => $lastCheckout,
      'status' => 'In progress',
      'invoice' => $this->checkoutModel->getInvoice($year, $month, $date, $userId, $checkoutId)
    ];

    $this->checkoutModel->save($data);

    $this->cartModel
      ->where('user_id', session()->get('user_id'))
      ->delete();

    return redirect()->to("/invoice/$invoiceId");
  }

  public function invoice()
  {
    session()->remove('checkout_id');
    // $orderDetail = $this->checkoutModel->select('invoice, order_date, total_price')->find($transactionId);

    $checkoutId = $this->checkoutModel->get()->getLastRow('array')['id'];
    // if ($transactionId == null) {
    $orderDetail = $this->checkoutModel->select('invoice, order_date, total_price')->find($checkoutId);
    // $transactionId = session()->get('checkout_id');
    // }

    $data = [
      'title' => 'Invoice',
      'transaction_id' =>  $checkoutId,
      'order_details' => $orderDetail,
      'items' => $this->checkoutDetailModel->getItems($checkoutId),
      // 'payment_method' => '',
      'user' => $this->userModel->select('name,email, phone_num, address')->find(session()->get('user_id')),
    ];
    // dd($data);
    return view('product/invoice', $data);
  }

  public function myOrderList()
  {
    session()->remove('checkout_id');

    $checkoutId = $this->checkoutModel->get()->getLastRow('array')['id'];

    $data = [
      'title' => 'My Order',
      'my_orders' => $this->checkoutModel->getMyOrders(),
      'products_review' => $this->checkoutDetailModel->getItems($checkoutId),
    ];
    return view('product/my-orders', $data);
  }

  public function order_complete()
  {
    session()->remove('checkout_id');

    if ($this->request->isAJAX()) {
      $data = [
        'id' => $this->request->getVar('checkoutId'),
        'status' => 'Completed',
        'order_completed' => date('Y-m-d H:i:s'),
      ];

      $this->checkoutModel->save($data);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }
}
