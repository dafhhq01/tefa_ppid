<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['category_id','title', 'slug', 'content', 'file', 'is_external_link', 'external_url', 'button_label'])]
class information extends Model
{
    public function category()
    {
        return $this->belongsTo(information_category::class);
    }
}
