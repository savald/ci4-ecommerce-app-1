<?php

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
  return $img->select('user_image')->find($id)['user_image'];
}

