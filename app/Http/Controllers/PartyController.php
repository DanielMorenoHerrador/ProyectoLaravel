<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\User;

class PartyController extends Controller
{
    //

    public function showAllParty(){

        try {
            
            return Party::all();

        } catch(QueryException $error) {
            return $error;
        }
    }    

    public function añadirParty(Request $request) {

        $name = $request->input('name');
        $game = $request->input('gameId');

        try {

            // Aquí primero insertamos el registro en la tabla "Parties", y luego en la tabla "Belongs" para así poder luego buscar los miembros de cada party.

            $party = Party::create([

                    'name' => $name,
                    'gameId' => $game

                ]);
        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

    public function deleteParty(Request $request) {

        $userId = User::id();
        $partyId = $request->input('partyId');

        try {

            // Aquí verificamos que el usuario sea el creador de la party, ya que solo el creador podría eliminarla, de ser correcto se procede con la solicitud. De lo contrario no hará nada.

            return Party::where('owner', '=', $userId)->where('id', '=', $partyId)->delete($partyId);

        }

        catch (QueryException $error) {

            $errorCode = $error->errorInfo[1];

            return response()->json([

                'error' => $errorCode

            ]);
            
        }

    }
}
