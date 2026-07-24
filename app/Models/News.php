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
            // Jika thumbnail diganti dan sebelumnya punya thumbnail lama
            if ($model->isDirty('thumbnail') && $model->getOriginal('thumbnail')) {
                Storage::disk('public')->delete($model->getOriginal('thumbnail'));
            }
        });

        static::deleting(function ($model) {
            // Saat berita dihapus, hapus juga thumbnail-nya
            if ($model->thumbnail) {
                Storage::disk('public')->delete($model->thumbnail);
            }
        });
    }
}
