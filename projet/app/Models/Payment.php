<?php

namespace App\Models;

use App\Models\User;
use App\Models\Speciality;
use App\Models\Rendezvous;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['amount', 'patient_id', 'speciality_id', 'rendezvous_id'];
    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }
    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class, 'rendezvous_id');
    }
}
