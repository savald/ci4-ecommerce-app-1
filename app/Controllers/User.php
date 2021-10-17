<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Models\UsersModel;

class User extends BaseController
{
  protected $userModel;
  protected $productModel;
  protected $cartModel;
  protected $categoryModel;

  public function __construct()
  {
    $this->cartModel = new CartModel();
    $this->productModel = new ProductModel();
    $this->userModel = new UsersModel();
    $this->categoryModel = new CategoriesModel();
  }

  public function index()
  {
    $user_id = session()->get('user_id');
    $data = [
      'title' => 'Let\'s Shop',
      'productCarts' => $this->cartModel->getCartsUser($user_id),
      'products' => $this->productModel->getProducts()
    ];
    shuffle($data['products']);
    return view('index', $data);
  }

  public function profile()
  {
    $user_id = session()->get('user_id');
    $data = [
      'title' => session()->get('name'),
      'user' => $this->userModel->find($user_id)
    ];
    // dd($data);
    return view('dashboard/index', $data);
  }

  public function update_user()
  {
    $validate = [
      'name' => [
        'rules' => 'required|min_length[3]|max_length[100]',
        'errors' => [
          'required' => 'Name must be filled!',
          'min_length' => 'Name too short!',
          'max_length' => 'Name too long!'
        ]
      ],
      'email' => [
        'rules' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'errors' => [
          'required' => 'Email must be filled!',
          'is_unique' => 'Email has been registered!',
          'valid_email' => 'Please use a valid email!'
        ],
      ],
    ];

    if ($this->request->getVar('password') != '') {
      $validate['password'] = [
        'rules' => 'required|min_length[6]',
        'errors' => [
          'required' => 'Password must be filled!',
          'min_length' => 'Password minimum 6 characters!',
        ]
      ];
      $validate['pass_confirm'] = [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Confirmation Password must be filled!',
          'matches' => 'The  password does not match!',
        ]
      ];
    }

    if (!$this->validate($validate)) {
      return redirect()->back()->withInput();
    }

    $id = $this->request->getVar('id');
    $password = '';
    $oldPassword = $this->userModel->select('password')->find($id);
    if ($password = '') {
      $password = $oldPassword;
    } else {
      $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
    }

    $data = [
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'email' => $this->request->getVar('email'),
      'password' => $password,
    ];

    $this->userModel->save($data);
    return redirect()->back()->withInput();
  }
}
