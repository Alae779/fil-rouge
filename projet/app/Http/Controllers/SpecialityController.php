<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialisationRequest;
use App\Http\Requests\UpdateSpecialisationRequest;
use App\Models\Speciality;
use App\Models\Rendezvous;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function show(){
        $specialities = Speciality::paginate(9);
        return view('speciality', compact('specialities'));
    }
    public function admin_show(){
        $specialities = Speciality::paginate(10);
        $specs = Speciality::all();
        $averagePrice = Speciality::avg('price');
        return view('admin.speciality', compact('specs', 'specialities', 'averagePrice'));
    }
    public function create(){   
        return view('admin.create');
    }
    public function store(StoreSpecialisationRequest $request){
        Speciality::create($request->validated());
        $specialities = Speciality::all();
        return redirect()->back();
    }
    public function edit($id){
        $speciality = Speciality::findOrFail($id);
        return view('admin.edit', compact('speciality'));
    }
    public function update($id, UpdateSpecialisationRequest $request){
        $speciality = Speciality::findOrFail($id);
        $speciality->update($request->validated());
        $specialities = Speciality::paginate(10);
        $specs = Speciality::all();
        $averagePrice = Speciality::avg('price');
        return view('admin.speciality', compact('specialities', 'specs', 'averagePrice'));
    }
    public function delete($id){
        $speciality = Speciality::destroy($id);
        return redirect()->back();
    }
    public function reserver($id){
        $speciality = Speciality::find($id);
        return view('reserver', compact('speciality'));
    }
    public function confirm(Speciality $speciality){
        Rendezvous::create([
            'date' => $speciality->date,
            'heure' => $speciality->time,
            'statut' => 'pending',
            'patient_id' => Auth::id(),
            'speciality_id' => $speciality->id
        ]);
        return redirect()->route('booking_success', $speciality->id);
    }
    public function bookingSuccess(Speciality $speciality){
        return view('bookingsuccess', compact('speciality'));
    }
    public function specify(Request $request){
        $query = Speciality::query();
        $query->where('name', 'like', '%' . $request->search . '%');
        $specialities = $query->paginate(10)->withQueryString();
        return view('speciality', compact('specialities'));
    }
}
