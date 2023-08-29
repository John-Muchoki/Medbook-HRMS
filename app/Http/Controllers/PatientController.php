<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Gender;
use App\Models\Service;

class PatientController extends Controller
{
    /**
     * THis controller will be for just two operations:
     * 1. Get all patients and their data
     * 2. Creating a new patient and their data
     */

     /**
      * Get all patients and their data
    */
    public function index() {
        // Get all patients and their data
        $patients = Patient::with('gender','service')->get();
        // $patients = Patient::with('gender')->with('service')->get();

        // Return the patients and their data
        return response()->json($patients);
    }

    /**
     * Creating a new patient and their data
    */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:255|string',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'type_of_service' => 'required|string|max:255',
            'comments' => 'required|string|max:500',
        ]);

        $gender = Gender::create([
            'gender' => $validatedData['gender']
        ]);
        $patient = Patient::create([
            'name'=>$validatedData['name'],
            'gender_id'=>$gender->id,
            'date_of_birth'=>$validatedData['date_of_birth'],
        ]);
        $patient->gender()->associate($gender);
        $patient->save();
        
        $service = Service::create([
            'type_of_service' => $validatedData['type_of_service'],
            'comments' => $validatedData['comments'],
            'patient_id' => $patient->id,

        ]);
        $service->patient()->associate($patient);
        $service->save();

        return response()->json(
            [
                'error' => false,
                'message' => 'Post created successfully'
            ], 201
        );

    }
    
}
