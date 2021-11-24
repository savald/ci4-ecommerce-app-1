<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{

  public function login_modal()
  {
    if ($this->request->isAJAX()) {

      $output = view('auth/_login-modal');
      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function register_modal()
  {
    if ($this->request->isAJAX()) {

      $output = view('auth/_register-modal');
      return json_encode($output);
    } else {
      throw PageNotFoundException::forPageNotFound();
    }
  }

  public function login()
  {
    if ($this->request->isAJAX()) {
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
            'min_length' => 'Email & Password is not match!',
          ]
        ],
      ];

      if (!$this->validate($validate)) {
        $errors = [
          'email' => $this->validation->getError('email'),
          'password' => $this->validation->getError('password'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $email = $this->request->getVar('email');
      $password = $this->request->getVar('password');
      $dataUser = $this->userModel->where(['email' => $email,])->first();

      if (!$dataUser) {

        $output = [
          'status' => false,
          'errors' => [
            'email' => '',
            'password' => 'Email is not registered yet!'
          ]
        ];

        return json_encode($output);
      } else {

        if (password_verify($password, $dataUser['password'])) {
          session()->set([
            'user_id' => $dataUser['id'],
            'name' => $dataUser['name'],
            'logged_in' => TRUE
          ]);
          return json_encode(['status' => true]);
        }

        // if login fail
        $output = [
          'status' => false,
          'errors' => [
            'email' => '',
            'password' => 'Email & Password is not match!'
          ]
        ];
        return json_encode($output);
      }
    }
  }

  public function register()
  {
    if ($this->request->isAJAX()) {
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
        $errors = [
          'name' => $this->validation->getError('name'),
          'email' => $this->validation->getError('email'),
          'password' => $this->validation->getError('password'),
          'pass_confirm' => $this->validation->getError('pass_confirm'),
        ];

        $output = [
          'status' => false,
          'errors' => $errors
        ];

        return json_encode($output);
      }

      $data = [
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      ];

      $this->userModel->save($data);

      session()->set([
        'user_id' => $this->userModel->insertID(),
        'name' => $this->request->getVar('name'),
        'logged_in' => TRUE
      ]);
      return json_encode(['status' => true]);
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}
