<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function shopUser()
  {
    return $this->belongsTo('App\Models\ShopUser');
  }

}
