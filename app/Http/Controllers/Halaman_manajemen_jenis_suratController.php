<?php

namespace App\Http\Controllers;

use App\Models\jenis_surat;
use Illuminate\Http\Request;

class Halaman_manajemen_jenis_suratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_jenis_surat = jenis_surat::orderby('id_jenis_surat','DESC')->get();
        return view('jenis.index', compact('data_jenis_surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
        ]);

        $create_jenis_surat = new jenis_surat();
        $create_jenis_surat->jenis_surat = $request->input('jenis_surat');
        $create_jenis_surat->save();

        if ($create_jenis_surat) {
            
            return redirect()->to('jenis-surat')->with('success','data is created');

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
