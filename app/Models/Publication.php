<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
