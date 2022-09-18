<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $input = $request->all();
        $admin = Admin::select('email','password')->first();
        // return $admin->email;
        
        // return Hash::check( $input['password'], $admin->password);
        if($admin->email == $input['email'] && Hash::check( $input['password'], $admin->password))
        {
        
                return redirect()->to('/companies');
        }else{
            return redirect()->route('login')
                ->with('error',' Admin Credentials not matched . Please Email-Address And Password Are Wrong.');
        }
    }
}
