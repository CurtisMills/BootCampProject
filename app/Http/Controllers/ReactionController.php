<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function like(User $user)
    {
        auth()->user()->likes()->create([
            'liked_id' => $user->id
        ]);

        

        return redirect(route('home'));
    }

    public function dislike(User $user)
    {
        auth()->user()->dislikes()->create([
            'rejected_id' => $user->id
        ]);

        return redirect(route('home'));
    }
}
