<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table = 'rendezvous';
    protected $fillable = ['date', 'heure', 'statut', 'patient_id', 'consultation_id'];
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
