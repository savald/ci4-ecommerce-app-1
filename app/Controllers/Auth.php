<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
  public $userModel;
  public function __construct()
  {
    $this->userModel = new UsersModel();
  }

  public function login()
  {
    if ($this->request->getMethod() == 'post') {
      $validate = [
        'email' => [
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => 'Email must be filled!',
            'valid_email' => 'Please use a valid email!'
          ]
        ],
        'password' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
            'required' => 'Password must be filled!',
            'min_length' => 'Password minimum 6 characters!',
          ]
        ],
      ];

      if (!$this->validate($validate)) {
        return redirect()->back()->withInput();
      }

      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $dataUser = $this->userModel->where(['email' => $email,])->first();

      if ($dataUser) {
        if (password_verify($password, $dataUser->password)) {
          session()->set([
            'user_id' => $dataUser->id,
            'name' => $dataUser->name,
            'logged_in' => TRUE
          ]);
          session()->setFlashdata('success', 'Login Successfully');
          return redirect()->to('/');
        }
        session()->setFlashdata('error', 'Wrong Email/Password');
        return redirect()->back();
      }
    }

    return view('auth/login');
  }

  public function register()
  {
    if ($this->request->getMethod() == 'post') {
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
          'rules' => 'required|is_unique[users.email]|valid_email',
          'errors' => [
            'required' => 'Email must be filled!',
            'is_unique' => 'Email has been registered!',
            'valid_email' => 'Please use a valid email!'
          ],
        ],
        'password' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
            'required' => 'Password must be filled!',
            'min_length' => 'Password minimum 6 characters!',
          ]
        ],
        'pass_confirm' => [
          'rules' => 'required|matches[password]',
          'errors' => [
            'required' => 'Confirmation Password must be filled!',
            'matches' => 'The  password does not match!',
          ]
        ],
      ];

      if (!$this->validate($validate)) {
        return redirect()->back()->withInput();
      }

      $data = [
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];

      $this->userModel->save($data);
      session()->setflashdata('success', 'Successfull Registration');
      return redirect()->to('/login');
    }

    return view('auth/register');
  }

  public function logout()
  {
    session()->setFlashdata('success', 'You have been logout!');
    session()->destroy();
    return redirect()->to('/');
  }
}
