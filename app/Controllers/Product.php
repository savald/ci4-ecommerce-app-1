<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Product extends BaseController
{

  public function index()
  {
    $data['products'] = $this->productModel->get()->getResultArray();
    
    return view('dashboard/product/products', $data);
  }

  public function detail($id)
  {
    $data = [
      'productDetail' => $this->productModel->getProductById($id),
      'products' => $this->productModel->get()->getResultArray()
    ];

    shuffle($data['products']);
    return view('product/detail', $data);
  }

  public function create()
  {
    return view('dashboard/product/add-product');
  }

  public function store()
  {
    $validate = [
      'product_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Please enter the product name',
        ]
      ],
      'category' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Please choose the product category',
        ]
      ],
      'price' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Please enter the product price',
          'numeric' => 'Please enter the valid value',
        ]
      ],
    ];

    if (!$this->validate($validate)) {
      return redirect()->back()->withInput();
    }

    $data = [
      'user_id' => session()->get('user_id'),
      'product_name' => $this->request->getVar('product_name'),
      'category_id' => $this->request->getVar('category'),
      'description' => $this->request->getVar('description'),
      'price' => $this->request->getVar('price'),
    ];
    // dd($data);
    $this->productModel->save($data);
    session()->setflashdata('success', 'Successfull Add New Product');
    return redirect()->back();
  }

  public function edit()
  {
    # code...
  }

  public function update()
  {
  }


  public function delete($id = null)
  {
  }
}
