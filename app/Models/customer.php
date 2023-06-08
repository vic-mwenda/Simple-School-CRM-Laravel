<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

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
        'consent_terms'
    ];


    public function inquiries()
    {
        return $this->hasMany(inquiries::class);
    }

}
