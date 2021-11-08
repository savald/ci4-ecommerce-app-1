<?php

use App\Libraries\SearchProduct;
use App\Models\CategoriesModel;
use App\Models\UsersModel;

function categories()
{
  $categories = new CategoriesModel();
  return $categories->select('category_name, slug')->get()->getResult();
}

function userImg()
{
  $id = session()->get('user_id');
  $img = new UsersModel();
  // dd( $img->select('user_image')->find($id));
  return $img->select('user_image')->find($id);
}

function searchProduct()
{
  $searchProduct = new SearchProduct();
  return $searchProduct->searchProduct();
}
