<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{

  public function index()
  {
    
    $data = [
      'title' => 'Let\'s Shop',
      'categories' => $this->categoriesModel->select('category_name, slug')->get()->getResult(),
      'products' => $this->productModel->getProducts(),
      'cartModel' => $this->cartModel,
      // 'tabel' => $this->cartModel->where('user_id', 0)->findColumn('product_id') ?? []
    ];
    // dd($data);
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
