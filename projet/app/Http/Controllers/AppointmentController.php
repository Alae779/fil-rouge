<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function admin_show(Request $request){
        $appointment = Rendezvous::paginate(10);
        $query = Rendezvous::query();
        $status = $request->get('statut', "pending");
        if($status){
            $query->where('statut', $status);
            $appointments = $query->paginate(10)->withQueryString();
        }
        return view('admin.appointment', compact('appointments'));
    }
    public function show(){
        $userID = Auth::id();
        $user = User::find(Auth::id());
        $appointments = $user->appointments()->where('patient_id', $userID)->paginate(10);
        return view('appointment', compact('appointments'));
    }
    public function accept($id){
        DB::beginTransaction();
        
        try{
            $appointment = Rendezvous::findOrFail($id);
            $appointment->update(['statut' => 'accepted']);
            Payment::create([
                'amount' => $appointment->speciality->price,
                'patient_id' => $appointment->patient_id,
                'speciality_id' => $appointment->speciality_id,
                'rendezvous_id' => $appointment->id,
                ]);
            DB::commit();
            return redirect()->back();
        }catch( \Exception $e){
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function cancel($id){
        $appointment = Rendezvous::findOrFail($id);
        $appointment->update(['statut' => 'rejected']);
        return redirect()->back();
    }
    public function filter(Request $request){
        $query = Rendezvous::query();
        if($request->filled('statut')){
            $query->where('statut', $request->statut);
        }
        $appointments = $query->paginate(10)->withQueryString();

        $userID = Auth::id();
        $user = User::find(Auth::id());
        if($user->role === 'admin'){
            return view('admin.appointment', compact('appointments'));
        }
        return view('appointment', compact('appointments'));
    }
    public function cancel_my_appointment($id){
        $rdv = Rendezvous::findOrFail($id);
        if ($rdv->patient_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }
        $rdv->update(['statut' => 'cancelled']);
        return redirect()->back();
    }
}
