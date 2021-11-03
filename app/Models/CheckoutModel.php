<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'checkouts';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'total_order', 'total_price', 'order_date', 'deadline_payment', 'status', 'invoice'];

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

    public function deletePendingProduct()
    {
        $sql = "DELETE FROM checkouts WHERE status='pending' AND deadline_payment < NOW()";
        return $this->db->query($sql);
    }

    public function getInvoice($year, $month, $date, $userId, $checkoutId)
    {
        return 'INV/' . $year . $month . $date . $userId . '/' . $checkoutId;
    }

    public function getMyOrders()
    {
        return $this->where('user_id', session()->get('user_id'))
            ->where('status', 'In progress')
            ->select('id, invoice, order_date, total_order, total_price')
            ->get()
            ->getResultArray();
    }
}
