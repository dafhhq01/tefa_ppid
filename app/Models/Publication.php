<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'category',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::updating(function ($model) {
            if ($model->isDirty('file') && $model->getOriginal('file')) {
                Storage::disk('public')->delete($model->getOriginal('file'));
            }
        });

        static::deleting(function ($model) {
            if ($model->file) {
                Storage::disk('public')->delete($model->file);
            }
        });
    }
}
