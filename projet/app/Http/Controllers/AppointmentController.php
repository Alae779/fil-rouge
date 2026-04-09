<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function admin_show(){
        $appointment = Rendezvous::paginate(15);
        return view('admin.appointment', compact('appointment'));
    }
    public function show(){
        $userID = Auth::id();
        $user = User::find(Auth::id());
        $appointments = $user->appointments()->where('patient_id', $userID)->paginate(10);
        return view('appointment', compact('appointments'));
    }
    public function accept($id){
        $appointment = Rendezvous::findOrFail($id);
        $appointment->update(['statut' => 'accepted']);
        return redirect()->back();
    }
    public function cancel($id){
        $appointment = Rendezvous::findOrFail($id);
        $appointment->update(['statut' => 'cancelled']);
        return redirect()->back();
    }
    public function filter(Request $request){
        $query = Rendezvous::query();
        if($request->filled('statut')){
            $query->where('statut', $request->statut);
        }
        $appointment = $query->paginate(10)->withQueryString();

        return view('admin.appointment', compact('appointment'));
    }
}
