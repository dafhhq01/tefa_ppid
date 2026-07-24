<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    protected $fillable = [
        'slug', 'type', 'title', 'subtitle', 'banner_image', 'content',
    ];

    public function scopeType ($query, $type){
        return $query->where('type', $type);
    }
}
