<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Position;
use App\Http\Controllers\Auth\RegisterController ;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller 
{
    protected $registerController;
    use RegistersUsers;

    public function showRegisteredData()
    {
        $registeredUsers = User::all(); // Retrieve all registered users
        return view('registered-data', compact('registeredUsers'));
    }
    
    public function edit(User $user)
    {
        $position = [
            'ord' => 'OFFICE OF REGIONAL DIRECTOR',
            'tsd' => 'TECHNICAL SERVICES DIVISION',
            'fas' => 'FINANCE AND ADMININSTRATIVE SERVICES',
            'psto_abra' => 'PSTO - Abra',
            'psto_apayao' => 'PSTO - Apayao',
            'psto_benguet' => 'PSTO - Benguet',
            'psto_ifugao' => 'PSTO - Ifugao',
            'psto_kalinga' => 'PSTO - Kalinga',
            'psto_mp' => 'PSTO - Mountain Province',
        ];
    
        return view('edit-user', compact('user', 'positions'));
    }
    
    public function editUser($id)
{
    $user = User::find($id); // Retrieve the user by ID

    // You can add validation or error handling logic here

    return view('edit-user', compact('user')); // Display the edit view with the user data
}
public function updateUserData(Request $request, $id)
{
    $user = User::find($id); // Retrieve the user by ID

    $this->validate($request, [
        'fname' => 'required|string|max:255',
        'minitial'=> 'required|string|max:255',
        'lname'=> 'required|string|max:255',
        'uname',
        'sex',
        'bday',
        'position',
        'division',
        'unit',
        'idno',
        'password',

        // Add other validation rules for your fields
    ]);

    $user->update($request->all());

    return redirect()->route('show-registered-data')->with('success', 'User updated successfully');
   
}

public function deleteUser($id)
{
    $user = User::find($id);

    if (!$user) {
        // Handle case where the user is not found
        return redirect()->route('show-registered-data')->with('error', 'User not found');
    }

    $user->delete();

    return redirect()->route('show-registered-data')->with('success', 'User deleted successfully');
}

public function addUser()
{
    return view('add-user'); // Assuming your Blade view is named add-user.blade.php
}

public function addNewUser(Request $request)
{

    $this->validate($request, [
        'fname' => 'required|string|max:255',
        'minitial' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'uname' => 'required|string|max:255|unique:users',
        'sex' => 'required|string',
        'bday' => 'required|date',
        'position' => 'required|string',
        'division' => 'required|string',
        'unit' => 'required|string',
        'idno' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:8', // Adjust the password validation as needed
    ]);

    // Create a new User instance and save it to the database
    $user = User::create($request->all());

    return redirect()->route('show-registered-data')->with('success', 'User added successfully');
}


}