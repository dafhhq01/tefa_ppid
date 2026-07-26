<?php

namespace App\Models;

use App\Models\InformationCategory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable(['category_id','title','slug','content','file','is_external_link','external_url','button_label',])]
class information extends Model
{
    protected static function booted(): void
    {
        static::creating(function (self $model): void {
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });

        static::deleting(function (Information $information) {
            if ($information->file && Storage::disk('public')->exists($information->file)) {
                Storage::disk('public')->delete($information->file);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(InformationCategory::class);
    }
}
