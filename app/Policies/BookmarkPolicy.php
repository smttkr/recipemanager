<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BookmarkPolicy
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

  public function delete(User $user, Bookmark $bookmark)
  {
    return $user->shopUser->id === $bookmark->shop_user_id
      ? Response::allow()
      : Response::deny("自分以外のデータは操作できません");
  }
}
