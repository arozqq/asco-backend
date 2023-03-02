<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;    
use App\Models\FcmToken;
use Exception;
use Illuminate\Http\Request;

class TokenToFCMController extends Controller
{
    public function sendToken(Request $request)
    {
        $request->validate([
            'token_to_fcm ' => 'unique:fcm_tokens,token_to_fcm',
        ]);

        // $t = FcmToken::first();

        // if ($t === ) {

        // }
        // $tokenToFCM = FcmToken::  
           
        FcmToken::create([
            'token_to_fcm' => $request->token_to_fcm,
        ]);

        $t = FcmToken::where('token_to_fcm ', $request->token_to_fcm)->first();
        
        return response()->json([
            'message' => 'Token has been added!',
            'data' => $t
        ]);
    }
}
