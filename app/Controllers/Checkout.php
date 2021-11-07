<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Checkout extends BaseController
{

  public function index()
  {
    // FInd product
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $data = [
        'title' => 'Find Products',
        'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
        'cartModel' => $this->cartModel,
        'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
        'pager' => $this->productModel->pager,
      ];
      return view('product/product-search', $data);
    }

    $totalPrice = $this->checkoutModel->select('total_price')->find(session()->get('checkout_id'));

    $data = [
      'title' => 'Checkout',
      'user' => $this->userModel->select('id, name, phone_num, address')->find(session()->get('user_id')),
      'total_price' => $totalPrice['total_price'],
      'products_cart' => $this->cartModel->getCartsUser(session()->get('user_id')),
    ];

    return view('product/checkout', $data);
  }

  public function checkout()
  {
    // FInd product
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $data = [
        'title' => 'Find Products',
        'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
        'cartModel' => $this->cartModel,
        'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
        'pager' => $this->productModel->pager,
      ];
      return view('product/product-search', $data);
    }

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
    return redirect()->to('/checkout');
  }

  public function place_order()
  {
    // FInd product
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $data = [
        'title' => 'Find Products',
        'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
        'cartModel' => $this->cartModel,
        'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
        'pager' => $this->productModel->pager,
      ];
      return view('product/product-search', $data);
    }

    $userId = sprintf("%02d", substr(session()->get('user_id'), -2));
    $checkoutId = sprintf("%02d", substr(session()->get('checkout_id'), -2));
    $year = date('y');
    $month = date('m');
    $date = date('d');

    $data = [
      'id' => session()->get('checkout_id'),
      'status' => 'In progress',
      'invoice' =>  $this->checkoutModel->getInvoice($year, $month, $date, $userId, $checkoutId)
    ];

    $this->checkoutModel->save($data);

    // $this->cartModel
    //   ->where('user_id', session()->get('user_id'))
    //   ->delete();

    return redirect()->to('/invoice');
  }

  public function invoice($transactionId = null)
  {
    // FInd product
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $data = [
        'title' => 'Find Products',
        'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
        'cartModel' => $this->cartModel,
        'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
        'pager' => $this->productModel->pager,
      ];
      return view('product/product-search', $data);
    }

    $orderDetail = $this->checkoutModel->select('invoice, order_date, total_price')->find($transactionId);

    if ($transactionId == null) {
      $orderDetail = $this->checkoutModel->select('invoice, order_date, total_price')->find(session()->get('checkout_id'));
      $transactionId = session()->get('checkout_id');
    }

    $checkoutId = session()->get('checkout_id');
    $data = [
      'title' => 'Invoice',
      'transaction_id' => $transactionId,
      'order_details' => $orderDetail,
      'items' => $this->checkoutDetailModel->getItems($checkoutId),
      // 'payment_method' => '',
      'user' => $this->userModel->select('name, phone_num, address')->find(session()->get('user_id')),
    ];
    return view('product/invoice', $data);
  }

  public function myOrderList()
  {
    // FInd product
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $data = [
        'title' => 'Find Products',
        'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
        'cartModel' => $this->cartModel,
        'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
        'pager' => $this->productModel->pager,
      ];
      return view('product/product-search', $data);
    }

    $data = [
      'title' => 'My Order',
      'my_orders' => $this->checkoutModel->getMyOrders(),
      'products_review' => $this->checkoutDetailModel->getItems(session()->get('checkout_id')),
    ];
    // dd($data);
    return view('product/my-orders', $data);
  }

  public function order_complete()
  {
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
