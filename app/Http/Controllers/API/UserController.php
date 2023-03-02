<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\PasswordValidationRules;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ],'Authentication Failed', 500);
            }

            $user = User::where('email', $request->email)->first();
            if ( ! Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules()
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ],'User Registered');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token,'Token Revoked');
    }

    public function getAllUser(Request $request)
    {
        $user = User::all();
        return ResponseFormatter::success([
            'message' => 'Success Fetch User Data',
            'data' => $user
        ]);
    }

    public function getUserById(User $user)
    {
        $u = User::find($user);
        if ($u) {
           return ResponseFormatter::success(
            $u,
            'User was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'User Data Not Found',
                404
            );
        }

    }


    //  public function getUserByName(User $user)
    // {
    //     $u = User::find($user->name);
    //     if ($u) {
    //       return ResponseFormatter::success(
    //         $u,
    //         'User was Found',
    //     );
    //     } else {
    //         return ResponseFormatter::error(
    //             null,
    //             'User Data Not Found',
    //             404
    //         );
    //     }

    // }
    
    
     public function getUserByName($name)
    {
        
        $u = User::where('name', $name)->first();
        
        
         if (!empty($u)) {
           return ResponseFormatter::success(
            $u,
            'User was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'User Data Not Found',
                404
            );
        }
    }
    


   // Register
   public function createUser(Request $request)
   {   
       // validasi
       try {
           $request->validate([
               'name' => ['required', 'string', 'max:255'],
           ]);

           // masukin user ke database
           User::create([
               'name' => $request->name,
           ]);

           // Ambil data user
           $user = User::where('name', $request->name)->first();

           // Buat token biar sekalian login
        //    $tokenResult = $user->createToken('authToken')->plainTextToken;

           return ResponseFormatter::success([
            //    'access_token' => $tokenResult,
            //    'token_type' => 'Bearer',
                'message' => 'User has been added!', 
               'user' => $user
           ]);

       } catch (Exception $error) {
           return ResponseFormatter::error([
               'message' => 'Something Went Wrong',
               'error' => $error,
           ], 'Create User Failed Failed', 500);
       }
   }



    
}
