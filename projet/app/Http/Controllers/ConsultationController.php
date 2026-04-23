<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Rendezvous;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function show(){
        $consultations = Consultation::paginate(9);
        return view('consultation', compact('consultations'));
    }
    public function admin_show(){
        $consultations = Consultation::paginate(10);
        $cons = Consultation::all();
        $averagePrice = Consultation::avg('price');
        return view('admin.consultation', compact('cons', 'consultations', 'averagePrice'));
    }
    public function create(){   
        return view('admin.create');
    }
    public function store(Request $request){
        Consultation::create($request->all());
        $consultations = Consultation::all();
        return redirect()->back();
    }
    public function edit($id){
        $consultation = Consultation::findOrFail($id);
        return view('admin.edit', compact('consultation'));
    }
    public function update($id){
        $consultation = Consultation::findOrFail($id);
        $consultation->update(request()->all());
        $consultations = Consultation::all();
        return view('admin.consultation', compact('consultations'));
    }
    public function delete($id){
        $consultation = Consultation::destroy($id);
        $consultations = Consultation::all();
        return view('admin.consultation', compact('consultations'));
    }
    public function reserver($id){
        $consultation = Consultation::find($id);
        return view('reserver', compact('consultation'));
    }
    public function confirm(Consultation $consultation){
        Rendezvous::create([
            'date' => $consultation->date,
            'heure' => $consultation->time,
            'statut' => 'pending',
            'patient_id' => Auth::id(),
            'consultation_id' => $consultation->id
        ]);
        return redirect()->route('booking_success', $consultation->id);
    }
    public function bookingSuccess(Consultation $consultation){
        return view('bookingsuccess', compact('consultation'));
    }
    public function specify(Request $request){
        $query = Consultation::query();
        $query->where('name', 'like', '%' . $request->search . '%');
        $consultations = $query->paginate(10)->withQueryString();
        return view('consultation', compact('consultations'));
    }
}
