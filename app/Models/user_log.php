<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_log extends Model
{
    use HasFactory;

    //mass assignable attributes
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'ip',
        'mac',
        'city',
        'created_at'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
