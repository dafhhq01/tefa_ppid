<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'ticket_number',
        'name',
        'email',
        'phone',
        'subject',
        'massage',
        'attacment',
        'status',
    ];
}
