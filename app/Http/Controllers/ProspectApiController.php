<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prospect = Prospect::all();
        return response()->json([
            "success" => true,
            "message" => "Liste des prospects",
            "data" => $prospect
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomProspect'=>'required',
            'prenomProspect'=>'required',
            'telephoneProspect'=>'required',
            'emailProspect'=>'required',
            'dateCreation'=>'required',
            'idCommerciaux'=>'required',
        ]);

        $prospect = Prospect::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Prospect crée avec succès.",
            "data" => $prospect
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prospect = Prospect::find($id);

        if (is_null($prospect)) {
            return $this->sendError('Prospect non trouvé.');
        }

        return response()->json([
            "success" => true,
            "message" => "Prospect trouvé avec succès.",
            "data" => $prospect
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomProspect'=>'required',
            'prenomProspect'=>'required',
            'telephoneProspect'=>'required',
            'emailProspect'=>'required',
            'dateCreation'=>'required',
            'idCommerciaux'=>'required',
        ]);

        $input = $request->all();
        $prospect->idProspect = $input['idProspect'];
        $prospect->nomProspect = $input['nomProspect'];
        $prospect->prenomProspect = $input['prenomProspect'];
        $prospect->telephoneProspect = $input['telephoneProspect'];
        $prospect->emailProspect = $input['emailProspect'];
        $prospect->dateCreation = $input['dateCreation'];
        $prospect->idCommerciaux = $input['idCommerciaux'];
        $prospect->save();

        return response()->json([
            "success" => true,
            "message" => "Prospect mis à jour avec succès.",
            "data" => $prospect
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prospect::destroy($id);
        return response()->json([
            "success" => true,
            "message" => "Prospect supprimé avec succès.",
        ]);
    }
}
