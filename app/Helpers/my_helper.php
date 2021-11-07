<?php

use App\Libraries\SearchProduct;
use App\Models\CategoriesModel;

function categories()
{
  $categories = new CategoriesModel();
  return $categories->select('category_name, slug')->get()->getResult();
}

function searchProduct()
{
  $searchProduct = new SearchProduct();
  return $searchProduct->searchProduct();
}
