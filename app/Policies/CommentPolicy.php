<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CommentPolicy
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

  public function delete(User $user, Comment $comment)
  {
    return $user->shopUser->id === $comment->shop_user_id
      ? Response::allow()
      : Response::deny("自分以外データは操作できません");
  }
}
