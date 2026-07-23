<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
