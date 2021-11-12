<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $likedByUsers = $user->hasLiked->pluck('user_id');
        // Users that have liked me.

        $users = User::whereIn('id', $likedByUsers)->get();

        return view('likes.index', compact('users'));
    }
}
