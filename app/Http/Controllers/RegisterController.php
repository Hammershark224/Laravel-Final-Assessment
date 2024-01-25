<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('ManageUser.register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $attributes = $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|min:2',
            'phone_num' => 'required|max:12|unique:users,phone_num',
            'password' => 'required|min:5|max:255|confirmed',
            'role' => 'required',
            'IC_number' => 'required|numeric', // Add validation rule for IC_number
            'terms' => 'required',
        ]);

        // Create a new user
        
        $user = User::create($attributes);

        // Create a new vendor associated with the user
        $user->vendor()->create([
            'IC_number' => $attributes['IC_number'],
            // Add other vendor attributes as needed
        ]);

        // Log in the registered user
        auth()->login($user);

        // Redirect to the dashboard or any other desired route
        return redirect('/dashboard');
    }
}
