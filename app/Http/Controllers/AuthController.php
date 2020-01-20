<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function CompanyRegister(){
        return view('frontend.companyregister');
    }

    public function UserRegister(){
        return view('frontend.userregister');
    }

    public function ComRegisterProcess(){

    }
    public function UserRegisterProcess(Request $request){

        $request->validate([
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
            'role_id' => 4,
        ];

        try{
            User::create($data);
            session()->flash('message', 'User created Successfully.');
            session()->flash('type', 'success');
            return redirect()->route('login');
        } catch(Exception $e){
            session()->flash('message', $e->getMessage());
            session()->flash('type', 'danger');

            return redirect()->back();
        }
    }

    public function ShowLogin(){
        return view('frontend.login');
    }

    public function LoginProcess(Request $request){
        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }
        session()->flash('message', 'Invalid Credentials');
        session()->flash('type', 'danger');

        return redirect()->back();
 
    }
}
