<?php

namespace App\Http\Controllers;

use App\Models\surat;
use Illuminate\Http\Request;

class Halaman_dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_surat = surat::orderby('id_surat','asc')->get();
        return view('dashboard.index')->with(['data_surat' => $data_surat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, surat $surat )
    {
        $data = $request->validate([ //Check the suitability of the name to be processed into data
            'tanggal_surat' => 'required',
            'ringkasan' => 'required',
            'file' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif',
          ]);
    
          
    
            $image_file = $request->file('file'); //call to field to database name 
            $image_ekstensi = $image_file->extension(); //call to image extension
            $image_nama = 'file-upload-'.date('ymdhis', strtotime('+7 hour')) . '.' . $image_ekstensi; //create name and date upload image 
            $image_file->move(public_path('image'), $image_nama); //move image to public and then call image name has create
            
            $data = new surat();
            $data ['id_user'] = 1; //connect to foreign key field database id_user equal one
            $data ['id_jenis_surat'] = 1; //connect to foreign key field database id_user equal one
            $data->tanggal_surat = $request->get('tanggal_surat'); //get is the same as input to call the name of an input
            $data->ringkasan = $request->get('ringkasan'); //get is the same as input to call the name of an input
            $data->file = $image_nama; //call image name has create 
            $data->save(); //save model

            if ($data) {
                return redirect()->to('dashboard')->with('success','data has created');
            }else {
                return redirect()->back();
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
