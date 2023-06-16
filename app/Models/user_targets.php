<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_targets extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rate',
        'start_date',
        'end_date',
    ];
}
