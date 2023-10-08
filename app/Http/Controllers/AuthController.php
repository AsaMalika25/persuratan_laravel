<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'username has required',
            'password' => 'password has required'
        ]);

        $validate_login = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($validate_login)) {

            $user = Auth::user();

                if ($user->role == 'admin' || $user->role == 'operator') {
                    return redirect('dashboard')->with('success', 'you are logged');
                }else {
                    return redirect()->back()->withErrors('The username and password entered are incorrect');
                }
                
            }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('success', 'logout success');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
