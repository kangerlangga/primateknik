<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'judul' => 'Data Harga',
            'DataHarga' => Harga::latest()->get(),
        ];
        return view('pages.admin.v_harga', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'Tambah Harga',
        ];
        return view('pages.admin.v_harga_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'NamaMesin'     => 'required|max:45',
            'Jenis'     => 'required|max:255',
            'Harga'     => 'required|numeric|max_digits:4',
            'Kapasitas' => 'required|numeric|max_digits:5',
            'Listrik'   => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'Bonus'     => 'required|max:45',
            'Garansi'   => 'required|numeric|max_digits:2',
        ]);

        //create
        Harga::create([
            'id_harga'          => 'Harga'.Str::random(33),
            'produk_harga'      => $request->NamaMesin,
            'jenis_harga'       => $request->Jenis,
            'nominal_harga'     => $request->Harga,
            'visib_harga'       => $request->visibilitas,
            'kapasitas_harga'   => $request->Kapasitas,
            'listrik_harga'     => $request->Listrik,
            'bonus_harga'       => $request->Bonus,
            'garansi_harga'     => $request->Garansi,
            'created_by'        => Auth::user()->email,
            'modified_by'       => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('harga.tambah')->with(['success' => 'Harga Berhasil Ditambahkan!']);
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
        $data = [
            'judul' => 'Edit Harga',
            'EditHarga' => Harga::findOrFail($id),
        ];
        return view('pages.admin.v_harga_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'NamaMesin'     => 'required|max:45',
            'Jenis'     => 'required|max:255',
            'Harga'     => 'required|numeric|max_digits:4',
            'Kapasitas' => 'required|numeric|max_digits:5',
            'Listrik'   => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'Bonus'     => 'required|max:45',
            'Garansi'   => 'required|numeric|max_digits:2',
        ]);

        //get by ID
        $harga = Harga::findOrFail($id);

        //update
        $harga->update([
            'produk_harga'      => $request->NamaMesin,
            'jenis_harga'       => $request->Jenis,
            'nominal_harga'     => $request->Harga,
            'visib_harga'       => $request->visibilitas,
            'kapasitas_harga'   => $request->Kapasitas,
            'listrik_harga'     => $request->Listrik,
            'bonus_harga'       => $request->Bonus,
            'garansi_harga'     => $request->Garansi,
            'modified_by'       => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('harga.data')->with(['success' => 'Harga Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $harga = Harga::findOrFail($id);

        //delete
        $harga->delete();

        //redirect to index
        return redirect()->route('harga.data')->with(['success' => 'Harga Berhasil Dihapus!']);
    }
}
