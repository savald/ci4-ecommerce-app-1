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
    protected $useTimestamps        = false;
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

    public function getTotal($totalPrice)
    {
        $total = 0;
        foreach ($totalPrice as $price) {
            $total += floatval($price);
        }
        return number_format($total, 0, ',', '.');
        // return $total;
    }
}
