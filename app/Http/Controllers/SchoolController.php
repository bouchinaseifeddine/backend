<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "Found succefully" ,
            "data" => School::with(['city.wilaya' , 'stage' , 'key.user' ])->get(),
        ],200);
    }

    public function store(Request $request)
    {
        $school = School::create($request->all());

        return response()->json([
            'message'=> 'Created succefully' ,
            'data'=> School::where('id' , $school->id)->with(['city.wilaya', 'stage' , 'key.user' ])->first(),
        ],200);
    }

    public function update(Request $request, School $school)
    {
        $school->update($request->all());

        return response()->json([
            'message'=> 'Updated succefully' ,
            'data'=> School::where('id' , $school->id)->with(['city.wilaya', 'stage' , 'key.user'])->first(),
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        return response()->json([
            'message'=> 'Deleted succefully' ,
        ],200);
    }
}
