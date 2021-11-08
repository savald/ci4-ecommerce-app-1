<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{

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
      'user_image' => [
        'rules' => [
          'mime_in[user_image,image/jpg,image/jpeg,image/png]',
          'max_size[user_image,1024]',
          'is_image[user_image]'
        ],
        'errors' => [
          'max_size' => 'The image size is too large',
          'is_image' => 'Please upload an image',
          'mime_in' => 'Please upload an image'
        ]
      ]
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

    $imgFile = $this->request->getFile('user_image');

    if ($imgFile->getError() == 4) {
      $imgName = $this->request->getVar('oldUserImg');
    } else {
      $oldUserImg = $this->request->getVar('oldUserImg');
      // get random name
      $imgName = $imgFile->getRandomName();
      // move to folder image
      $imgFile->move('assets/images/user_images', $imgName);
      // delete old image
      if ($oldUserImg != 'default_user.png') {
        unlink('assets/images/user_images/' . $oldUserImg);
      }
    }

    session()->set([
      'user_image' => $imgName
    ]);

    $data = [
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'email' => $this->request->getVar('email'),
      'password' => $password,
      'user_image' => $imgName,
    ];

    // dd($data);

    $this->userModel->save($data);
    return redirect()->back()->withInput();
  }
}
