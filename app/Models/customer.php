<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class customer extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'country',
        'state',
        'city',
        'postal_code',
        'gender',
        'education_level',
        'institution_attended',
        'field_of_study',
        'how_did_you_hear',
        'consent_terms',
        'user_id'
    ];


    public function inquiries()
    {
        return $this->hasMany(inquiries::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student()
    {
        return $this->hasOne(Students::class,'email','email');
    }

    /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone;

    }

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(Notification $notification): array|string
    {
        return $this->email;

    }
}
