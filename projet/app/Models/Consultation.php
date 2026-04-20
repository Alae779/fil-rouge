<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['name', 'description', 'duree', 'price', 'date', 'time'];
    public $timestamps = false;
}
