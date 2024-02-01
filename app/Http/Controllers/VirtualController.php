<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Virtual;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class VirtualController extends Controller 
{

    public function showVirtualEvent()
    {
        return view('virtual');
    }

    public function getMeetingsData()
    {
        $meetingsData = DB::connection('meetings')->table('meetings')->get();

        // Add any additional logic or return the data as needed
       // return view('your.view.name', ['meetingsData' => $meetingsData]);
    }

    public function create(Request $request)
{
    
   // Validate the form data
    /* $validatedData = $request->validate([
        'v_event' => 'required',
        'e_start' => 'required',
        't_start' => 'required',
        'e_end' => 'required',
        't_end' => 'required',
        'p_num' => 'required',
        'focal_p' => 'required',
        'center' => 'required',
         ]);
         
          $virtual = Virtual::create($validatedData);
        */
        $virtual = new Virtual;
        $virtual->v_event = $request->input('v_event');
        $virtual->e_start = $request->input('e_start');
        $virtual->t_start = $request->input('t_start');
        $virtual->e_end = $request->input('e_end');
        $virtual->t_end = $request->input('t_end');
        $virtual->p_num = $request->input('p_num');
        $virtual->focal_p = $request->input('focal_p');
        $virtual->center = $request->input('center');
        $virtual->center = $request->input('link');

        // Repeat for other fields
        $virtual->save();
   

    // Create a new Virtual model instance and save it to the database
   
    // Redirect after creating the record
    return redirect('/show-virtual-data')->with('status', 'register-success');
}

    

    public function showVirtualData()
    {

        $registeredUsers = Virtual::all(); // Replace YourModel with the actual model you are using
        return view('virtual-data', compact('registeredUsers'));
    }

    public function deleteUser($id)
    {
        $user = Virtual::find($id);

        if (!$user) {
            // Handle case where the user is not found
            return redirect()->route('show-virtual-data')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('show-virtual-data')->with('success', 'User deleted successfully');
    }

    public function addEvent()
    {
        return view('add-event'); // Assuming your Blade view is named add-user.blade.php
    }

    public function addNewEvent(Request $request)
    {
        $virtual = new Virtual;
        $virtual->v_event = $request->input('v_event');
        $virtual->e_start = $request->input('e_start');
        $virtual->t_start = $request->input('t_start');
        $virtual->e_end = $request->input('e_end');
        $virtual->t_end = $request->input('t_end');
        $virtual->p_num = $request->input('p_num');
        $virtual->focal_p = $request->input('focal_p');
        $virtual->center = $request->input('center');
        $virtual->center = $request->input('link');

        // Repeat for other fields
        $virtual->save();

    return redirect()->route('show-virtual-data')->with('success', 'User added successfully');
    }

    public function editVirtual($id)
{
    $user = Virtual::find($id); // Retrieve the user by ID

    // You can add validation or error handling logic here

    return view('edit-virtual', compact('user')); // Display the edit view with the user data
}
public function updateVirtual(Request $request, $id)
{
    $user = Virtual::find($id); // Retrieve the user by ID

    $this->validate($request, [
        'v_event',
        'e_start',
        't_start',
        'e_end',
        't_end',
        'p_num',
        'focal_p',
        'center',
        'link'

        // Add other validation rules for your fields
    ]);

    $user->update($request->all());

    return redirect()->route('show-virtual-data')->with('success', 'User updated successfully');
   
}
}
