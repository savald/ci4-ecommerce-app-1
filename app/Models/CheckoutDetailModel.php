<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutDetailModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'checkoutdetails';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['checkout_id', 'product_id', 'quantity'];

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


    public function getItems($checkoutId)
    {
        return $this->join('products', 'products.id=checkoutdetails.product_id')
            ->join('checkouts', 'checkouts.id=checkoutdetails.checkout_id')
            ->select('product_id, product_name, quantity, product_image, price')
            ->where('checkout_id', $checkoutId)
            ->get()
            ->getResultArray();
    }
}
