<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationMember extends Model
{

    protected $fillable = [
        'name',
        'position',
        'photo',
        'parent_id',
        'order'
    ];

    public function parent()
    {
        return $this->belongsTo(OrganizationMember::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(OrganizationMember::class, 'parent_id')->orderBy('order');
    }
}
