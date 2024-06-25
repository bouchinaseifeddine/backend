<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $key = Key::where('value' , $request->post('key'))->first();

        if(!$key || $key->status === 'used'){
            return response()->json([
                "message" =>  "this key is not availabel"
            ],422);
        }

        $user = $key->user()->create([
            "email" => $request->post("email"),
            "password" => Hash::make( $request->post("password")),
        ]);

        $token = $user->createToken($key->profileable_type)->plainTextToken;

        return response()->json([
            "message"=> "loged succ" ,
            "token"=> $token,
        ],201);
    }

    public function login(LoginRequest $req){
        if(!Auth::attempt(["email"=> $req->post("email"),"password"=> $req->post("password")])){
            return response()->json(["message" => "Incorrect password"], 422);
        }

        $user = User::where("email", $req->post("email"))->first();

        $user->tokens()->delete();
        $token = $user->createToken("token")->plainTextToken;

        return response()->json([
            "token" => $token,
        ], 200);
    }

    public function logout(){
        User::find(Auth::id())->tokens()->delete();
        return response()->json(["message"=> "Loged out succesfully"],203);
    }
}
