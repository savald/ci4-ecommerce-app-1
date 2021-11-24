<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Product extends BaseController
{
  public function index()
  {
    session()->remove('checkout_id');

    $data = [
      'title' => 'Let\'s Shop',
      'products' => $this->productModel->getProducts(),
      'cartModel' => $this->cartModel,
    ];
    shuffle($data['products']);
    return view('index', $data);
  }

  public function find()
  {
    session()->remove('checkout_id');

    $searchProduct = $this->request->getVar('searchProduct');
    $data = [
      'title' => 'Find Products',
      'products' => $this->productModel->findMyProduct($searchProduct)->paginate(10, 'products'),
      'cartModel' => $this->cartModel,
      'currentPage' => $this->request->getVar('page_products') ? $this->request->getVar('page_products') : 1,
      'pager' => $this->productModel->pager,
    ];
    return view('product/product-search', $data);
  }

  public function detail($productId)
  {
    session()->remove('checkout_id');

    $data = [
      'title' => 'Detail Product',
      'productDetail' => $this->productModel->getProductById($productId),
      'cartModel' => $this->cartModel,
      'reviews' => $this->reviewModel->getUserReview($productId)
    ];
    if (empty($data['productDetail'])) {
      throw PageNotFoundException::forPageNotFound();
    }

    return view('product/detail', $data);
  }

  public function category($category)
  {
    session()->remove('checkout_id');

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

  public function products()
  {
    session()->remove('checkout_id');

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
            'required' => 'Please select the category',
          ]
        ],
        'price' => [
          'rules' => 'required|numeric',
          'errors' => [
            'required' => 'Please enter the product price',
            'numeric' => 'Please enter the valid value',
          ]
        ],
        'product_image' => [
          'rules' => [
            'uploaded[product_image]',
            'mime_in[product_image,image/jpg,image/jpeg,image/png]',
            'max_size[product_image,1024]',
            'is_image[product_image]'
          ],
          'errors' => [
            'max_size' => 'The image size is too large',
            'is_image' => 'Please upload image format',
            'mime_in' => 'Please upload image format'
          ]
        ]
      ];

      if (!$this->validate($validate)) {
        $errors = [
          'product_name' => $this->validation->getError('product_name'),
          'category' => $this->validation->getError('category'),
          'price' => $this->validation->getError('price'),
          'product_image' => $this->validation->getError('product_image'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];


        return json_encode($output);
      }

      $imgFile = $this->request->getFile('product_image');

      if ($imgFile->getError() == 4) {
        $imgName = 'default_product.png';
      } else {
        $imgName = $imgFile->getRandomName();
        $imgFile->move('assets/images/product_images', $imgName);
      }

      $data = [
        'user_id' => session()->get('user_id'),
        'product_name' => $this->request->getVar('product_name'),
        'category_id' => $this->request->getVar('category'),
        'description' => $this->request->getVar('description'),
        'price' => $this->request->getVar('price'),
        'product_image' =>  $imgName
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
      $data['product'] = [
        'id' => $this->request->getVar('id'),
        'productImg' => $this->request->getVar('productImg')
      ];
      $output = view('dashboard/partials/_delete-modal', $data);

      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function delete_product()
  {
    if ($this->request->isAJAX()) {

      $productImg = $this->request->getVar('productImg');
      $id = $this->request->getVar('id');
      $this->productModel->where('id', $id)->delete();
      unlink('assets/images/product_images/' . $productImg);

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
