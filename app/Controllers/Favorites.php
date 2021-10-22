<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Favorites extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'My Favorites',
            'cartModel' => $this->cartModel,
            'products' => $this->productModel->get()->getResultArray()
        ];
        return view('product/favorites', $data);
    }

    public function get_my_favorites()
    {
        if ($this->request->isAJAX()) {
            $user_id = session()->get('user_id');
            $data = [
                'favoritesProducts' => $this->favoritesModel->getFavoritesUser($user_id),
            ];

            $output = view('partials/_my-favorites', $data);
            return json_encode($output);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function add_favorite()
    {
        if ($this->request->isAJAX()) {
            $userId = $this->request->getVar('user_id');
            $productId = $this->request->getVar('product_id');
            $categorytId = $this->request->getVar('category_id');
            $favoriteTable = $this->favoritesModel->where('user_id', $userId)->findColumn('product_id') ?? [];

            if (!in_array($productId, $favoriteTable)) {
                // if user has been logged in return true
                if ($userId != 0) {
                    $data = [
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'category_id' => $categorytId,
                    ];

                    $this->favoritesModel->insert($data);
                    $output = [
                        'status' => true,
                        'table' => 'favorites'
                    ];
                    return json_encode($output);
                }
            }

            // if user hasn't logged in return false
            return json_encode(['status' => false]);
        } else {
            throw PageNotFoundException::forPageNotFound();
        };
    }

    public function delete_favorite()
    {
        if ($this->request->isAJAX()) {

            $userId = $this->request->getVar('user_id');
            $productId = $this->request->getVar('product_id');
            $categorytId = $this->request->getVar('category_id');

            $this->favoritesModel
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->where('category_id', $categorytId)
                ->delete();

            $output = [
                'status' => true,
                'table' => 'favorites'
            ];
            return json_encode($output);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
