<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'content',
        'published_at',
        'is_featured',
        'author_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    // Relasi ke User pembuat berita
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Accessor untuk URL thumbnail
    public function getThumbnailUrlAttribute()
    {
        if (!$this->thumbnail) {
            return null;
        }
        return url('storage/' . $this->thumbnail);
    }

    protected static function booted()
    {
        static::updating(function ($model) {
            if ($model->isDirty('thumbnail') && $model->getOriginal('thumbnail')) {
                $oldFile = $model->getOriginal('thumbnail');
                $path = 'public/news/' . $oldFile;

                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        });

        static::deleting(function ($model) {
            if ($model->thumbnail) {
                $path = 'public/news/' . $model->thumbnail;
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }
        });
    }
}
