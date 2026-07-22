<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformationRequest extends Model
{
    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'phone',
        'identity_number',
        'subject',
        'massage',
        'attacment',
        'status',
    ];

    // Relasi one to many, satu permohonan punya banyak riwayat status
    public function statusHistories(): HasMany {
        return $this->hasMany(StatusHistory::class, 'request_id');
    }
}
