<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\FavoritesModel;

class Favorites extends BaseController
{
    protected $favoritesModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->favoritesModel = new FavoritesModel();
    }

    public function index()
    {
        $user_id = session()->get('user_id');
        $data = [
            'title' => 'My Favorites',
            'productCarts' => $this->cartModel->getCartsUser($user_id),
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
            // return redirect()->back();
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }
}
