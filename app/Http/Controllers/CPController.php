<?php

namespace App\Http\Controllers;

use App\Models\CP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'judul' => 'Data Contact Person',
            'DataCP' => CP::latest()->get(),
        ];
        return view('pages.admin.v_cp', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'Tambah Contact Person',
        ];
        return view('pages.admin.v_cp_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'nama'         => 'required|max:45',
            'jabatan'      => 'required|max:255',
            'nowa'         => 'required|numeric|max_digits:13',
        ]);

        //create
        CP::create([
            'id_cp'       => 'CP'.Str::random(33),
            'nama_cp'     => $request->nama,
            'jabatan_cp'  => $request->jabatan,
            'wa_cp'       => $request->nowa,
            'visib_cp'    => $request->visibilitas,
            'created_by'  => Auth::user()->email,
            'modified_by' => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('cp.tambah')->with(['success' => 'Contact Person Berhasil Ditambahkan!']);
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
            'judul' => 'Edit Contact Person',
            'EditCP' => CP::findOrFail($id),
        ];
        return view('pages.admin.v_cp_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'nama'         => 'required|max:45',
            'jabatan'      => 'required|max:255',
            'nowa'         => 'required|numeric|max_digits:13',
        ]);

        //get by ID
        $cp = CP::findOrFail($id);

        //update
        $cp->update([
            'nama_cp'     => $request->nama,
            'jabatan_cp'  => $request->jabatan,
            'wa_cp'       => $request->nowa,
            'visib_cp'    => $request->visibilitas,
            'modified_by' => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('cp.data')->with(['success' => 'Contact Person Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $cp = CP::findOrFail($id);

        //delete
        $cp->delete();

        //redirect to index
        return redirect()->route('cp.data')->with(['success' => 'Contact Person Berhasil Dihapus!']);
    }
}
