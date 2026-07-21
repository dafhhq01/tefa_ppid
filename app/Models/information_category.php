<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['slug', 'description'])]
class information_category extends Model
{
    public function informations()
    {
        return $this->hasMany(Information::class, 'category_id');
    }
}
