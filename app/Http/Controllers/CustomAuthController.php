<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('shipment_summary')
                ->withSuccess('Signed in');
        }

        return redirect("/")->withSuccess('Email address or password is incorrect');
    }

    public function registration(Request $request)
    {

        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);


        $data = $request->all();
        $check = $this->create($data);

        if($check){
            return redirect()->back()->with('success', 'Successfully added User');
        }

    }


    public function create(array $data)
    {
        return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'role' => $data['role'],
        'created_by' => Auth::user()->id,
        'password' => Hash::make($data['password'])

    ]);


    }
    public function registration_view(){
        $userlist=User::get();
        return view('registration',['userlist'=>$userlist]);

    }


    ////////logout///////
    public function signOut() {

        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
