<?php

namespace App\Http\Controllers;

use App\Models\tbluser;
use Illuminate\Http\Request;

class Halaman_manajemen_userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = tbluser::orderBy('id_user','asc')->get(); //Sorts data and displays all data
        return view('user.index',compact('data_user')); //calling variables that have been input
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tambah_user'); //return view page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ //check the required input
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $create_user = new tbluser(); //create new object model
        $create_user->username = $request->input('username'); //change database to input name
        $create_user->password = $request->input('password'); //change database to input name
        $create_user->role = $request->input('role'); //change database to input name
        $create_user->save(); //save to new object model
         //save to new object model

        if ($create_user) { //checking variable model
            return redirect()->to('/akun')->with('success','user has created'); //redirect to route table views
        }else {
            return redirect()->back(); //redirect back with error message to store function
        }
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
    public function edit(string $id_user)
    {
        $edit_user = tbluser::where('id_user', $id_user)->first();
        if ($edit_user) {
            return view('user.edit',compact('edit_user'));
        }else {
            return redirect()->back();
        }
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
        $remove_user = tbluser::where('id_user', $id)->first();
        if($remove_user){

            $remove_user->delete();

            return redirect()->to('/akun')->with('success', 'berhasil melakukan delete data');
        }else{
            return redirect()->back();
        }
    }
}
