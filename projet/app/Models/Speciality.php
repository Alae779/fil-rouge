<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = ['name', 'description', 'duree', 'price', 'date', 'time'];
    public $timestamps = false;

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
