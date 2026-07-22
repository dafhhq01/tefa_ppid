<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusHistory extends Model
{
    protected $fillable = [
        'request_id',
        'status',
        'note',
        'changed_by',
    ];


    // Relasi ke tabel informasi_requests
    public function informationRequest(): BelongsTo {
        return $this->belongsTo(InformationRequest::class, 'request_id');
    }

    // Relasi ke tabel user, admin mengubah status
    public function changer(): BelongsTo {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
