<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "Found succefully" ,
            "data" => Student::where('school_id' , User::find(Auth::id())->key->profileable_id)->with(['city.wilaya' , 'year.stage' , 'feature' , 'key.user' ,'school.city.wilaya'])->get(),
        ],200);
    }

    public function store(Request $request)
    {
        $school = School::where("id",User::find(Auth::id())->key->profileable_id)->first();

        $student = $school->students()->create([
            'name' => $request->input('name'),
            'last' => $request->input('last'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'gender' => $request->input('gender'),
            'school_id' => $school->id,
            'year_id' => $request->input('year_id'),
            'city_id' => $request->input('city_id')
        ]);

        return response()->json([
            'message'=> 'Created succefully' ,
            'data'=> Student::where('id', $student->id)->with(['city.wilaya', 'year.stage' , 'feature' , 'key.user'])->first(),
        ],200);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return response()->json([
            'message'=> 'Updated succefully' ,
            'data'=> Student::where('id', $student->id)->with(['city.wilaya', 'year.stage' , 'feature' , 'key.user'])->first(),
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message'=> 'Deleted succefully' ,
        ],200);
    }
}
