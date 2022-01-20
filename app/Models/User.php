<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }
    public function preference()
    {
        return $this->hasOne(UserPreference::class);
    }

    public function image() 
    {
        return $this->hasOne(Image::class);
    }
    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
    public function rejections()
    {
        return $this->hasMany(Dislike::class, 'rejected_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function hasLiked()
    {
        return $this->hasMany(Like::class, 'liked_id');
    }

    public function matchOnPreferences()
    {
        $user = Auth::user();
        $disliked = $user->dislikes->pluck('rejected_id');
        $liked = $user->likes->pluck('liked_id');
        // Picking out all the user_id's of where the user has liked or disliked someone
        
        if($this->preference->isMatchable()) {
            $query = UserPreference::where('user_id', '!=', $this->user_id);

            $query->similarTo($this->preference)->whereNotIn('user_id', $disliked)
                                                ->whereNotIn('user_id', $liked);

            return $query->get();
        }


    }
    protected static function booted() {
        static::updated(function ($user) {
            
        });

    }
}
