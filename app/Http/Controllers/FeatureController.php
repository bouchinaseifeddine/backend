<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Key;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatureController extends Controller
{

    public function index()
    {
        return Student::where('school_id' , User::find(Auth::id())->key->profileable_id)->with(['city.wilaya' , 'feature'])->first();
    }

    public function store(Request $request)
    {
        $key = $request->post('key');
        if (!isset($key)) {
            return response()->json([
                'error'=> 'invalide key'
            ],200);
        }
        $student = Student::where("id" , Key::where('value' , $key)->first()->profileable_id)->first();
        $feature = Feature::where("student_id" , $student->id)->first();

        if ($feature != null) {
           $feature->update($request->except('key'));
           return response()->json([
            'message' => 'updated succefully' ,
            "data" => $feature
           ],200);
        }
        $feature = $student->feature()->create($request->except('key'));

        return response()->json([
            'message' => 'created succefully' ,
            "data" => $feature
        ],200);
    }


}
