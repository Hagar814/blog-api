<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable=['title','content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

