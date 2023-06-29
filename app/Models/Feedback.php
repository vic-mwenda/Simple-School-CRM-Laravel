<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
         use HasFactory;



         protected $fillable = [
             'inquiry_id',
             'customer_id',
             'feedback',
         ];

         protected $table = 'feedbacks';

         public function inquiry()
         {
            return $this->belongsTo(inquiries::class);
         }

         public function customer()
         {
            return $this->belongsTo(customer::class);
         }

}
