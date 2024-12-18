<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'judul' => 'Data Mahasiswa',
            'DataMhs' => Mahasiswa::latest()->get(),
        ];
        return view('pages.admin.v_mhs', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'judul' => 'Tambah Mahasiswa',
        ];
        return view('pages.admin.v_mhs_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create
        Mahasiswa::create([
            'nama'     => $request->nama,
            'nim'      => $request->nim,
            'prodi'    => $request->prodi,
            'jurusan'  => $request->jurusan,
        ]);

        //redirect to index
        return redirect()->route('mhs.tambah')->with(['success' => 'Mahasiswa Berhasil Ditambahkan!']);
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
