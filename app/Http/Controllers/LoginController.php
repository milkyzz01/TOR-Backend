<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //function to get the data in the login table
    public function ShowLogInData(){
        $LoginData = LoginModel::all();
        return view('login', ['LoginData' => $LoginData]);
    }

    public function Log(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);
    
    // Find the user by email
    $user = LoginModel::where('LogUsername', $request->input('email'))->first();
    $password = LoginModel::where('LogPassword', $request->input('password'));

    // Check if the user exists and the password matches
    if ($user && $password) {
        return response()->json(['message' => 'Log success', 'user' => $user], 200);
    } else {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

public function addUser(Request $request){
    // Validate the request
    $validatedData = $request->validate([
        'LogFirstName' => 'required|string',
        'LogLastName' => 'required|string',
        'LogUsername' => 'required|string|unique:logintable',
        'LogPassword' => 'required|string',
        'LogAddress' => 'required|string',
    ]);

    // Hash the password before saving
    $validatedData['LogPassword'] = Hash::make($validatedData['LogPassword']);

    // Create the user
    $addUser = LoginModel::create($validatedData);

    if($addUser){
        return response()->json(['message' => 'User added successfully', 'data' => $addUser], 201);
    } else {
        return response()->json(['message' => 'Cannot add user'], 400);
    }
}
}
