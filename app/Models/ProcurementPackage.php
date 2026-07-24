<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProcurementPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'stage',
        'file',
        'external_url',
        'parent_id'
    ];

    // Relasi ke RUP / Parent
    public function parent()
    {
        return $this->belongsTo(ProcurementPackage::class, 'parent_id');
    }

    // Relasi ke Paket / Children
    public function children()
    {
        return $this->hasMany(ProcurementPackage::class, 'parent_id');
    }

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
