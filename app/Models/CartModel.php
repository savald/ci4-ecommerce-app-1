<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'carts';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'product_id', 'category_id'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function getCartsUser($user_id)
    {
        return $this->db->table('carts')
            ->join('users', 'users.id=carts.user_id')
            ->join('products', 'products.id=carts.product_id')
            ->join('categories', 'categories.id=carts.category_id')
            ->select('products.id, product_name, product_image, price')
            ->where('users.id', $user_id)
            ->get()
            ->getResultArray();
    }

    public function getTotalPrice($totalPrice)
    {
        $total = 0;
        foreach ($totalPrice as $price) {
            $total += floatval($price);
        }
        return $total;
    }

    public function getCountCarts($user_id)
    {
        return count($this->select('products.id')
            ->join('users', 'users.id=carts.user_id')
            ->join('products', 'products.id=carts.product_id')
            ->where('users.id', $user_id)
            ->get()
            ->getResultArray());
    }

    public function checkCart($userId, $produtId)
    {
        $cartTabel = $this->where('user_id', $userId)->findColumn('product_id') ?? [];

        if (in_array($produtId, $cartTabel)) {
            return true;
        } else {
            return false;
        }
    }
}
