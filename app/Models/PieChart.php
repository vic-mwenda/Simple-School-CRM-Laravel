<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieChart extends Model
{
    use HasFactory;

    public $labels;
    public $dataset;
    public $colours;
}