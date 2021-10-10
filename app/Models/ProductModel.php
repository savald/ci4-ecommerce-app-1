<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'products';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['product_name', 'user_id', 'category_id', 'description', 'price', 'product_image', 'created_at', 'updated_at', 'deleted_at'];

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

    public function getUserProduct()
    {
        return $this->db->table('products')->join('users', 'users.id=products.user_id')
            ->join('categories', 'categories.id=products.category_id')
            ->where('users.id', session()->get('user_id'))
            ->select('product_image, product_name, description, price, category_name, products.created_at, products.updated_at')
            ->get()->getResultArray();
    }

    public function getProductById($id)
    {
        return $this->db->table('products')
            ->join('categories', 'categories.id=products.category_id')
            ->getWhere(['products.id' => $id])
            ->getResultArray();
    }
}
