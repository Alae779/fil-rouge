<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Rendezvous;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Const_;

class ConsultationController extends Controller
{
    public function show(){
        $consultations = Consultation::all();
        return view('consultation', compact('consultations'));
    }
    public function admin_show(){
        $consultations = Consultation::all();
        return view('admin.consultation', compact('consultations'));
    }
    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        Consultation::create($request->all());
        return redirect('/');
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
        return redirect()->back();
    }
    public function specify(Request $request){
        $query = Consultation::query();
        $query->where('name', 'like', '%' . $request->search . '%');
        $consultations = $query->paginate(10)->withQueryString();
        return view('consultation', compact('consultations'));
    }
}
