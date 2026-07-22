<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'content', 'file', 'external_url', 'type', 'order'])]
class Regulation extends Model
{
    //
}
