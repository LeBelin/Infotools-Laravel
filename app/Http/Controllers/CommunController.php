<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\Commerciaux;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CommunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $rendezvous = RendezVous::all();
       $factures = Facture::all();
       $produits = Produit::inRandomOrder()->get()->take(2);
       $clients= Client::all();
       $commerciaux = Commerciaux::all();
       $rendezvous = RendezVous::orderBy('created_at', 'desc')
    ->take(3)
    ->get()
    ->map(function ($rendezvous) {
    
        return $rendezvous;
    });


		return view('commun.index',compact('rendezvous','produits','factures','commerciaux','clients'))
            ->with('i', (request()->input('page', 1) - 1) * 3);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RendezVous $rendezVous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RendezVous $rendezVous)
    {
        $rendezVous->delete();
        return redirect()->route('commun.index')
        ->with('success','Rendez-Vous supprimé avec succès');
    }
}
