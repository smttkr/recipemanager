<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  public function shopUsers()
  {
    return $this->hasMany('App\Models\ShopUser');
  }

  public function recipes()
  {
    return $this->hasMany('App\Models\Recipe');
  }
  public function news()
  {
    return $this->hasMany('App\Models\News');
  }
}
