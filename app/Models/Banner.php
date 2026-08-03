<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['title', 'subtitle','image','button_text','button_link','order','is_active'])]

class Banner extends Model
{
    //
}
