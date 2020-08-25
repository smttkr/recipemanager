<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopUser extends Model
{
  public function comments()
  {
    return $this->hasMany('App\Models\Comment');
  }

  public function bookmarks()
  {
    return $this->hasMany('App\Models\Bookmark');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
