<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role; // Import the Role model
use App\Models\Department; // Import the Department model
use App\Models\ProgramCourse; // Import the PrograCourses model

class ManageDetailsController extends Controller {

    public function manageDetails()
{
    // Fetch all roles from the 'roles' table
    $roles = Role::all();

    // Fetch all the departments from the 'departments' table
    $departments = Department::all();
    // Fetch all the programcourses from the 'programcourses' table
    $programcourses = ProgramCourse::all();

    // Pass the $roles variable to the view
    return view('manage_details', compact('roles', 'departments', 'programcourses'));
}

    public function addRole(Request $request)
    {
        // Validate the input (you can use Laravel's validation rules)

    // Check if the role already exists in the database
    $roleName = $request->input('role');
    $existingRole = Role::where('name', $roleName)->first();

    if ($existingRole) {
        // Role already exists; return an error response
        return response()->json(['message' => 'Role already exists'], 422);
    }

    // Role does not exist; insert it into the database
    $role = new Role();
    $role->name = $roleName;
    $role->save();

    // Return a success response
    return response()->json(['message' => 'Role added successfully'], 200);
    }

    public function addDepartment(Request $request)
    {
        /*
        // Validate and store the new role in the database
        $request->validate([
            'department' => 'required|unique:departments,name',
        ]);

        Department::create([
            'name' => $request->input('department'),
        ]);

        // Redirect back to the Manage Details page
        return redirect('/manage_details')->with('alert2', 'You have successfully added a new department!');
        */
        
        // Validate the input (you can use Laravel's validation rules)
        // Check if the role already exists in the database
        $roleName = $request->input('department');
        $existingRole = Department::where('name', $roleName)->first();

        if ($existingRole) {
            // Role already exists; return an error response
            return response()->json(['message' => 'Role already exists'], 422);
        }

        // Role does not exist; insert it into the database
        $role = new Department();
        $role->name = $roleName;
        $role->save();

        // Return a success response
        return response()->json(['message' => 'Role added successfully'], 200);

    }
            
    public function addProgramCourse(Request $request)
    {
        // Validate the input (you can use Laravel's validation rules)
        // Check if the role already exists in the database
        $roleName = $request->input('programcourse');
        $existingRole = ProgramCourse::where('name', $roleName)->first();

        if ($existingRole) {
            // Role already exists; return an error response
            return response()->json(['message' => 'Role already exists'], 422);
        }

        // Role does not exist; insert it into the database
        $role = new ProgramCourse();
        $role->name = $roleName;
        $role->save();

        // Return a success response
        return response()->json(['message' => 'Role added successfully'], 200);
    }
            
}