<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        //This are the fields and conditions before user can proceed
        $LoginData = $request->validate([
            'login-name'=>['required'],
            'login-password'=>['required']
        ]);
       
        if(auth()->attempt(['name'=>$LoginData['login-name'],'password'=>$LoginData['login-password']])){
            $request->session()->regenerate();
        }
        return redirect('/');

        
    }

    public function register(Request $request){
        //This are the fields and conditions before user can proceed
        $RegisterData = $request->validate([
            'name'=>['required',Rule::unique('users','name')],
            'email'=>['required',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);
        $RegisterData['password'] = bcrypt($RegisterData['password']);
        $user = User::create($RegisterData);
        auth()->login($user);
        return redirect('/');

      
    }
     public function update(Request $request)
    {
        $user = auth()->user(); // Get the authenticated user

        // Validate the update data
        $updateData = $request->validate([
            'name' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            
        ]);

        // Update user information
        $user->update($updateData);

        return redirect('/myinformation');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
