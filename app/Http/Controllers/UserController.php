<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function edit_user(Request $request){

//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:6',
//        ]);

        $data = $request->all();

        if($data['password']){
            $info=User::where('id',$request->id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'created_by' => Auth::user()->id,
                'password' => Hash::make($data['password']),


            ]);
        }else{
            $info=User::where('id',$request->id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'created_by' => Auth::user()->id,
            ]);

        }

        if($info){
            return redirect()->back()->with('success','Update User Data Successfully');
        }





    }


    public function delete_user($id){
        $info=User::where('id',$id)->delete();
        if($info){return redirect()->back()->with('success','Successfully Deleted user Data');}

    }

}
