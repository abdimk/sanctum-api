<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\models\User;

class AuthController extends Controller
{
    //
   
    public function register(Request $request) {
        // Validate the request
        $formFields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        // Create the user
        $user = User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => Hash::make($formFields['password']), // Hash the password
        ]);

        // Create a token for the user
        $token = $user->createToken('myapptoken')->plainTextToken();

        // Prepare the response
        $response = [
            'user' => $user,
            'token' => $token
        ];

        // Return the response with a 201 status code
        return response($response, 201);
    }
}
