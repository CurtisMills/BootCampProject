<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rejected_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rejected() {
        return $this->belongsTo(User::class, 'rejected_id');
    }

}
