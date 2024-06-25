<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\StudentController;
use App\Models\School;
use App\Models\Stage;
use App\Models\Wilaya;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    $key = User::where('id' , Auth::id())->first()->key;
    $profile = null;
    switch ($key->profileable_type) {
        case 'admin':
            $profile = Admin::where('id' , $key->profileable_id)->with('key.user')->first();
            break;
        case 'school':
            $profile = School::where('id' , $key->profileable_id)->with('key.user')->first();
            break;
        default:
            break;
    }
    return response()->json([
        'userInfo' => $profile
    ],200);
});

Route::middleware(['guest:sanctum'])->group(function () {
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('feature',[FeatureController::class,'store']);

});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout',[AuthController::class,'logout']);
});


Route::middleware(['auth:sanctum'])->group(function(){

    Route::apiResource('students', StudentController::class)->missing(function(){
        return response()->json([
            'message' => 'Resource not found'
        ],404);
    });

    Route::apiResource('schools', SchoolController::class)->missing(function(){
        return response()->json([
            'message' => 'Resource not found'
        ],404);
    });


    Route::get('wilayas',function(){
        return response()->json([
            'message'=> 'Found succefully' ,
            'data' => Wilaya::with(['cities'])->get()
        ] , 200);
    });

    Route::get('stages',function(){
        return response()->json([
            'message'=> 'Found succefully' ,
            'data' => Stage::with(['years'])->get()
        ] , 200);
    });
});
