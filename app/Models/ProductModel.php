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
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['product_name', 'user_id', 'category_id', 'description', 'price', 'product_image'];

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

    public function getProducts()
    {
        return $this->db->table('products')
            ->join('categories', 'categories.id=products.category_id')
            ->select('products.id, price, product_name, product_image, category_name, user_id, category_id')
            ->get()
            ->getResultArray();
    }

    public function getUserProduct()
    {
        // User products in dashbboard
        return $this->join('users', 'users.id=products.user_id')
            ->join('categories', 'categories.id=products.category_id')
            ->where('users.id', session()->get('user_id'))
            ->select('products.id, product_image, product_name, description, price, category_name, products.created_at, products.updated_at');
    }

    public function getProductById($id)
    {
        return $this->join('categories', 'categories.id=products.category_id')
            ->select('products.id, price, product_name, product_image, description, category_name, user_id, category_id')
            ->find($id);
    }

    public function getProductByCategory($category)
    {
        return $this->join('categories', 'categories.id=products.category_id')
            ->select('products.id, price, product_name, product_image, category_name, user_id, category_id')
            ->getWhere(['category_name' => $category])
            ->getResultArray();
    }

    public function findMyProduct($keyword)
    {
        return $this->table('products')->like('product_name', $keyword)->orLike('price', $keyword);
    }
}
