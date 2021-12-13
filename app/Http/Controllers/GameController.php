<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function añadirGame(Request $request) {

        $title = $request->input('title');
        $url = $request->input('url');

        try {

            Game::create([

                    'title' => $title,
                    'url' => $url

                ]);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

    public function showAllGames() {

        try {
            
            return Game::all();

        } 
        
        catch(QueryException $error) {

            return $error;

        }

    }

    public function updateGame(Request $request) {

        $id = $request->input('id');

        $this->validate($request, [

            'id' => 'required',
            'title' => 'required|string|min:1',
            'url' => 'required|string|min:5'

        ], [

            'title' => 'title is required',
            'url' => 'url is required',

        ]);

    
        try {

            $validatedUpdate = [

                'title' => $request->title,
                'url' => $request->url

            ];

            return Game::where('id', '=', $id)->update($validatedUpdate);

        } 
        
        catch (QueryException $error) {

            return $error;

        }

    }
    
    public function deleteGame(Request $request) {

        $id = $request->input('id');

        try {

            return Game::where('id', '=', $id)->delete($id);

        } 
        
        catch (QueryException $error) {

            return $error;

        }

    }
}
