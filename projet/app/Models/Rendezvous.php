<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table = 'rendezvous';
    protected $fillable = ['date', 'heure', 'statut', 'patient_id', 'speciality_id'];
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
    public function payment(){
        return $this->hasOne(Payment::class, 'rendezvous_id');
    }
}
