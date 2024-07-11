<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->all());

        // Validate the user

        // Modificar el request
        $request->request->add([
            'username' => Str::slug ($request->username)
        ]);

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8'
        ]);
        
        // Store the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        
        // ]);
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('post.index');
    }
}
