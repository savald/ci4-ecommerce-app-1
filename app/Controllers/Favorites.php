<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Favorites extends BaseController
{

    public function index()
    {
        $user_id = session()->get('user_id');
        $data = [
            'title' => 'My Favorites',
            'favoritesProducts' => $this->favoritesModel->getFavoritesUser($user_id),
            'products' => $this->productModel->get()->getResultArray()
        ];

        // dd($data);

        return view('product/favorites', $data);
    }

    public function add_favorite()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'user_id' => session()->get('user_id'),
                'product_id' => $this->request->getPost('product_id'),
                'category_id' => $this->request->getPost('category_id'),
            ];
            $this->favoritesModel->insert($data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }
}
