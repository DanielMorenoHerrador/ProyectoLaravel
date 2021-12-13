<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function showAllMessages() {

        try {
            
            return Message::all();

        } 
        
        catch(QueryException $error) {

            return $error;

        }

    }

    public function añadirMessage(Request $request) {

        $user = $request->input('userId');
        $partyId = $request->input('partyId');
        $message = $request->input('body');

        try {

            return Message::create([

                'from' => $user,
                'body' => $message,
                'partyId' => $partyId

            ]);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

    public function updateMessages(Request $request) {

        $user = User::id();
        $messageId = $request->input('messageId');

        try { 
            
            $msg = ['message'=>$request->message];
            return Message::where('id', '=', $messageId)->update($msg);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

    public function deleteMessage(Request $request) {

        $user = User::id();
        $messageId = $request->input('messageId');

        try {

            return Message::where('id', '=', $messageId)->delete($messageId);

        } 
        
        catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];

            return response()->json([

                'error' => $codigoError

            ]);
            
        }

    }

}
