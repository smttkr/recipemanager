<?php

namespace App\Services;

use App\Models\Shop;
use App\Models\ShopUser;
use Illuminate\Support\Facades\Auth;


class Myself
{
  private $user;

  public function __construct()
  {
    $this->user = Auth::user();
    $this->user->shopUser->shop;
  }

  public function me()
  {
    return $this->user;
  }

}
