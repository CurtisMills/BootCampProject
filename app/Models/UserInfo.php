<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
        'occupation',
        'bio',
        'relationship_status',
        'country_of_birth',
        'age',
        'user_id'

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}