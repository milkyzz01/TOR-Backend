<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\StudentModel;


class StudentController extends Controller
{
    public function fetchStudents(){
        $fetchAll = StudentModel::all();
        if($fetchAll){
            return response()->json(['data' => $fetchAll]);
        }else{
            return response()->json(['message' => 'failed to fetch students']);
        }
    }

    public function deleteStudent(Request $request){
        //validate the request
        $request->validate([
            'studentID' => 'required|int'
        ]);

        $deleteStudent = StudentModel::where('studentID', $request->input('studentID'))->delete();

        if($deleteStudent){
            return response()->json(['message'=>'success deleting student'], 200);
        } else {
            return response()->json(['message' => 'dailed to delete student'], 401);
        }
    }

    public function addStudent(Request $request) {
        $validatedData = $request->validate([
            'StudentName' => 'required|string',
            'StudentAddress' => 'required|string',
            'studentPhone' => 'required|string',
            'studentGender' => 'required|string',
            'studentGender2' => 'nullable|string',
            'DateOfBirth' => 'required|date',
            'email' => 'required|string|email',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:7168', // Add validation for the photo
        ]);
        
        // Handle file upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public'); // Store the file and get the path
            $validatedData['photo'] = $photoPath; // Save the file path in the database
        }
        
        $addStudent = StudentModel::create($validatedData);
        if ($addStudent) {
            return response()->json(['message' => 'Student added successfully', 'addedData' => $validatedData], 201);
        } else {
            return response()->json(['message' => 'Failed to add student'], 401);
        }
    }
    

    // Fetch a specific student by ID
    public function fetchSpecificStudent($id){
        $student = StudentModel::find($id);
        if ($student) {
            return response()->json(['data' => $student]);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }
}
