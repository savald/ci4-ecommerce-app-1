<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Product extends BaseController
{

  public function products()
  {
    // Searching feature
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $products = $this->productModel->findMyProduct($keyword);
    } else {
      $products = $this->productModel;
    }

    $data = [
      'title' => 'My Products',
      'cartModel' => $this->cartModel,
      'products_user' => $products->getUserProduct()->paginate(10, 'products'),
      'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
      'total_products' => $this->productModel->where('user_id', session()->get('user_id'))->findColumn('id'),
      'pager' => $this->productModel->pager,

    ];
    return view('dashboard/product/products', $data);
  }

  public function detail($id)
  {
    $data = [
      'title' => 'Detail Product',
      'cartModel' => $this->cartModel,
      'productDetail' => $this->productModel->getProductById($id),
      'products' => $this->productModel->get()->getResultArray()
    ];

    if (empty($data['productDetail'])) {
      throw PageNotFoundException::forPageNotFound();
    }

    shuffle($data['products']);
    return view('product/detail', $data);
  }

  public function add_modal()
  {
    if ($this->request->isAJAX()) {

      $data['categories'] = $this->categoriesModel->get()->getResultArray();

      $output = view('dashboard/partials/_add-modal', $data);

      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function add_product()
  {
    if ($this->request->isAJAX()) {

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
        $errors = [
          'product_name' => $this->validation->getError('product_name'),
          'category' => $this->validation->getError('category'),
          'price' => $this->validation->getError('price'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $data = [
        'user_id' => session()->get('user_id'),
        'product_name' => $this->request->getVar('product_name'),
        'category_id' => $this->request->getVar('category'),
        'description' => $this->request->getVar('description'),
        'price' => $this->request->getVar('price'),
      ];
      $this->productModel->save($data);
      return json_encode(['status' => true]);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function delete_modal()
  {
    if ($this->request->isAJAX()) {
      $id = $this->request->getVar('id');
      $data['product'] = ['id' => $id];
      $output = view('dashboard/partials/_delete-modal', $data);

      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function delete_product()
  {
    if ($this->request->isAJAX()) {

      $id = $this->request->getVar('id');
      $this->productModel->where('id', $id)->delete();

      return json_encode(['status' => true]);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function edit_modal()
  {
    if ($this->request->isAJAX()) {

      $id = $this->request->getVar('id');

      $data = [
        'product' => $this->productModel->find($id),
        'categories' =>  $this->categoriesModel->get()->getResultArray()
      ];
      // dd($data['categories']);
      $output = view('dashboard/partials/_edit-modal', $data);

      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function edit_product()
  {
    if ($this->request->isAJAX()) {

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
        $errors = [
          'product_name' => $this->validation->getError('product_name'),
          'category' => $this->validation->getError('category'),
          'price' => $this->validation->getError('price'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $data = [
        'id' => $this->request->getVar('id'),
        'product_name' => $this->request->getVar('product_name'),
        'category_id' => $this->request->getVar('category'),
        'description' => $this->request->getVar('description'),
        'price' => $this->request->getVar('price'),
      ];
      // dd($data);
      $this->productModel->save($data);
      return json_encode(['status' => true]);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function category($category)
  {

    $categorySlug =  $this->categoriesModel->findColumn('slug');

    if (!in_array($category, $categorySlug)) {
      throw PageNotFoundException::forPageNotFound("Oops, Category: $category Is Not Found!");
    }

    $categoryName =  $this->categoriesModel->where('slug', $category)->findColumn('category_name')[0];

    $data = [
      'title' => 'Category: ' . $categoryName,
      'categoryName' => $categoryName,
      'cartModel' => $this->cartModel,
      'productsCategory' => $this->productModel->getProductByCategory($category)
    ];

    return view('/product/category', $data);
  }

  public function qty_product()
  {
    if ($this->request->isAJAX()) {
      $id = $this->request->getVar('id');
      $data = $this->productModel->select('price')->getWhere(['id' => $id])->getResultArray();
      return json_encode($data);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }
}
