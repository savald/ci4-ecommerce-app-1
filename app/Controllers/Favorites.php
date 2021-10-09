<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FavoritesModel;

class Favorites extends BaseController
{
    protected $favoritesModel;

    public function __construct()
    {
        $this->favoritesModel = new FavoritesModel();
    }

    public function index()
    {
        $data['title'] = 'My Favorites';

        return view('product/favorites');
    }

    public function add_favorite()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'user_id' => session()->get('user_id'),
                'product_id' => $this->request->getPost('product_id'),
                'category_id' => $this->request->getPost('category_id'),
            ];
            // $this->favoritesModel->insert($data);
            // return redirect()->back();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }
}
