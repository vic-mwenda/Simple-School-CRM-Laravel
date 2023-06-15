<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $connection = 'students';
    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
    ];

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
}
