<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function user()
    {
        return $this->morphOne(User::class, 'id');
    }

    use HasFactory;

    protected $guarded = [];
}