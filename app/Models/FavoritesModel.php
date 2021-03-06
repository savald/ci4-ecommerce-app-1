<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoritesModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'favorites';
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


    function getFavoritesUser($user_id)
    {
        return $this->join('users', 'users.id=favorites.user_id')
            ->join('products', 'products.id=favorites.product_id')
            ->join('categories', 'categories.id=favorites.category_id')
            ->select('products.id, product_name, product_image, price')
            ->getWhere(['users.id' => $user_id])
            ->getResultArray();
    }

    public function checkFavorite($userId, $produtId)
    {
        $favoriteTabel = $this->where('user_id', $userId)->findColumn('product_id') ?? [];

        if (in_array($produtId, $favoriteTabel)) {
            return true;
        } else {
            return false;
        }
    }
}
