<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class SearchProduct extends BaseController
{
  public function searchProduct()
  {
    $searchProduct = $this->request->getVar('searchProduct');
    if ($searchProduct) {
      $products = $this->productModel->findMyProduct($searchProduct);
    } else {
      $products = $this->productModel;
    }
  }
}
