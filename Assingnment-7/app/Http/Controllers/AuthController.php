<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function showregister(){
        return view('register');
    }

    public function register(Request $request){
        // Validate the incoming request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Insert user data into the database using Query Builder
    // $create_user = DB::table('users')->insert([
    //     'name' => $validated['name'],
    //     'username' => $validated['username'],
    //     'email' => $validated['email'],
    //     'password' => Hash::make($validated['password']),
    //     'created_at' => now(),
    //     'updated_at' => now(),
    // ]);
    //     // dd($create_user);
    //     // return response()->json(['message' => 'User registered successfully!']);
    //     return view('welcome');


    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Auth::login($user);

    return dd($user);

    }
}
