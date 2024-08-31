<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function owner(User $user, Comment $comment): bool
    {
        return  $comment->user_id === $user->getKey() || $user->isAdmin();
    }
}
