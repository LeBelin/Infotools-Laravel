<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Facture;
use App\Models\User;
use App\Models\Commerciaux;
use App\Models\Client;
use Illuminate\Http\Request;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $rendezvous = RendezVous::all();
       $clients= Client::all();
       $users= User::all();
       $commerciaux = Commerciaux::all();
       $rendezvous = RendezVous::orderBy('created_at', 'desc') 
       /**
       * Ajouter un option pour deffiler si trop de rdv
       */
    ->get()
    ->map(function ($rendezvous) {
    
        return $rendezvous;
    });


		return view('rdv.index',compact('rendezvous','commerciaux','clients','users'))
            ->with('i', (request()->input('page', 1) - 1) * 3);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients= Client::all();
        $commerciaux = Commerciaux::all();
        return view('rdv.index', compact('clients', 'commerciaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        


        RendezVous::create($request->all());
        return redirect()->back();

    // Envoyer l'e-mail avec le PDF en pièce jointe
        
    }

    /**
     * Display the specified resource.
     */
    public function show(RendezVous $rendezvous)
    {
        return view('rdv.index',compact('rendezvous'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        $clients= Client::all();
        $commerciaux = Commerciaux::all();
        return view('rdv.index', compact('rendezvous','clients', 'commerciaux'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RendezVous $rendezvous)
    {
        $rules = [
            'dateRendezVous' => 'required|date', 
            'heureDebutRendezVous' => 'required|time',
            'heureFinRendezVous' => 'required|time', 
            'idCommerciaux' => 'required|exists:commerciaux,id', 
            'idClient' => 'required|exists:clients,id', 
        ];
        $customMessages = [
            
        ];
        $request->validate($rules, $customMessages);

        $rendezvous->dateRendeVous= $request->input('dateRendezVous');
        $rendezvous->descriptionRendezVous= $request->input('descriptionRendezVous');
        $rendezvous->heureDebutRendezVous= $request->input('heureDebutRendezVous');
        $rendezvous->heureFinRendezVous= $request->input('heureFinRendezVous');
        $rendezvous->idCommerciaux= $request->input('idCommerciaux');
        $rendezvous->idClient= $request->input('idClient');

        $rendezvous->dave();
        return redirect()->route('rdv.index')
            ->with('success','Rendez-Vous mis à jour avec succès');
            $request->validate($rules, $customMessages);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RendezVous $rendezvous)
    {
        $rendezvous->delete();
        return redirect()->route('rdv.index')
        ->with('success','Rendez-Vous supprimé avec succès');
    
    }
    
}
