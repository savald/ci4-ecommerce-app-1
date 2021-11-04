<?php

namespace App\Controllers;

class Review extends BaseController
{
  public function addReview()
  {
    $productId = $this->request->getVar('product_id');
    $review = $this->request->getVar('review');
    $data = [];
    for ($i = 0; $i < count($review); $i++) {
      $items = [
        'user_id' => session()->get('user_id'),
        'product_id' => $productId[$i],
        'review' =>  $review[$i]
      ];
      $data[] = $items;
    }
    // dd($data);
    $this->reviewModel->insertBatch($data);
    return redirect()->back();
  }
}
