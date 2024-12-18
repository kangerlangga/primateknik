<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'judul' => 'Data Berita',
            'DataBerita' => Berita::latest()->get(),
        ];
        return view('pages.admin.v_berita', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'Tambah Berita',
        ];
        return view('pages.admin.v_berita_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'Judul'         => 'required|max:255',
            'Foto'          => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'Konten'        => 'required',
        ]);

        //upload image
        $foto = $request->file('Foto');
        $fotoName = time().Str::random(9).'.'.$foto->getClientOriginalExtension();
        $foto->move('assets/img/berita', $fotoName);

        //create
        Berita::create([
            'id_berita'     => 'Berita'.Str::random(33),
            'judul_berita'  => $request->Judul,
            'desk_berita'   => $request->Konten,
            'foto_berita'   => $fotoName,
            'visib_berita'  => $request->visibilitas,
            'created_by'    => Auth::user()->email,
            'modified_by'   => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('berita.tambah')->with(['success' => 'Berita Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            $detailB = Berita::findOrFail($id),
            'judul' => $detailB->judul_berita,
            'DetailBerita' => Berita::findOrFail($id),
        ];
        return view('pages.public.berita_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'judul' => 'Edit Berita',
            'EditBerita' => Berita::findOrFail($id),
        ];
        return view('pages.admin.v_berita_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'Judul'         => 'required|max:255',
            'Foto'          => 'image|mimes:jpeg,jpg,png|max:3072',
            'Konten'        => 'required',
        ]);

        //get by ID
        $berita = Berita::findOrFail($id);

        //cek gambar di upload
        if ($request->hasFile('Foto')) {
            $berita_path = 'assets/img/berita/' . $berita->foto_berita;
            if (file_exists($berita_path)) {
                unlink($berita_path);
            }
            //upload image
            $foto = $request->file('Foto');
            $fotoName = time().Str::random(9).'.'.$foto->getClientOriginalExtension();
            $foto->move('assets/img/berita', $fotoName);

            //update
            $berita->update([
                'judul_berita'  => $request->Judul,
                'desk_berita'   => $request->Konten,
                'foto_berita'   => $fotoName,
                'visib_berita'  => $request->visibilitas,
                'modified_by'   => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('berita.data')->with(['success' => 'Berita Berhasil Diperbarui!']);
        }else{
            //update
            $berita->update([
                'judul_berita'  => $request->Judul,
                'desk_berita'   => $request->Konten,
                'visib_berita'  => $request->visibilitas,
                'modified_by'   => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('berita.data')->with(['success' => 'Berita Berhasil Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $berita = Berita::findOrFail($id);

        //delete image
        $berita_path = 'assets/img/berita/' . $berita->foto_berita;
        if (file_exists($berita_path)) {
            unlink($berita_path);
        }

        //delete
        $berita->delete();

        //redirect to index
        return redirect()->route('berita.data')->with(['success' => 'Berita Berhasil Dihapus!']);
    }
}
