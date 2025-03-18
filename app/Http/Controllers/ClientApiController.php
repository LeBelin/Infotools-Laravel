<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        return response()->json([
            "success" => true,
            "message" => "Liste des clients",
            "data" => $client
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomClient'=>'required',
            'prenomClient'=>'required',
            'emailClient'=>'required',
            'telephoneClient'=>'required',
            'adresseClient'=>'required',
            'dateCreationClient'=>'required',
            'idCommerciaux'=>'required',
        ]);

        $client = Client::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Client crée avec succès.",
            "data" => $client
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);

        if (is_null($client)) {
            return $this->sendError('Client non trouvé.');
        }

        return response()->json([
            "success" => true,
            "message" => "Client trouvé avec succès.",
            "data" => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomClient'=>'required',
            'prenomClient'=>'required',
            'emailClient'=>'required',
            'telephoneClient'=>'required',
            'adresseClient'=>'required',
            'dateCreationClient'=>'required',
            'idCommerciaux'=>'required',
        ]);

        $input = $request->all();
        $client->idClient = $input['idClient'];
        $client->nomClient = $input['nomClient'];
        $client->prenomClient = $input['prenomClient'];
        $client->emailClient = $input['emailClient'];
        $client->telephoneClient = $input['telephoneClient'];
        $client->adresseClient = $input['adresseClient'];
        $client->dateCreationClient = $input['dateCreationClient'];
        $client->idCommerciaux = $input['idCommerciaux'];
        $client->save();

        return response()->json([
            "success" => true,
            "message" => "Client mis à jour avec succès.",
            "data" => $client
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);
        return response()->json([
            "success" => true,
            "message" => "Client supprimé avec succès.",
        ]);
    }
}
