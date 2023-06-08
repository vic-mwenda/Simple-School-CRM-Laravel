<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class inquiries extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'category',
        'customer_id',
        'user_id',
        'course_name',
        'subject'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
