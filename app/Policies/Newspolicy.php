<?php

namespace App\Policies;

use App\Models\User;
use App\Models\News;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class Newspolicy
{
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  public function delete(User $user, News $news)
  {
    return $user->shopUser->shop_id === $news->shop_id
      ? Response::allow()
      : Response::deny("自分のお店以外のデータは操作できません");
  }
}
