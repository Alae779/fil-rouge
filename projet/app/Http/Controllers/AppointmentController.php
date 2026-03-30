<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function admin_show(){
        $appointment = Rendezvous::paginate(15);
        return view('admin.appointment', compact('appointment'));
    }
}
