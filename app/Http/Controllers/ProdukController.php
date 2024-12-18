<?php

namespace App\Http\Controllers;

use App\Models\CP;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'judul' => 'Data Produk',
            'DataProduk' => Produk::latest()->get(),
        ];
        return view('pages.admin.v_produk', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [
            'judul' => 'Tambah Produk',
        ];
        return view('pages.admin.v_produk_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'NamaProduk'    => 'required|max:255',
            'Foto'          => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'Deskripsi'     => 'required',
        ]);

        //upload image
        $foto = $request->file('Foto');
        $fotoName = time().Str::random(9).'.'.$foto->getClientOriginalExtension();
        $foto->move('assets/img/produk', $fotoName);

        //create
        Produk::create([
            'id_produk'     => 'Produk'.Str::random(33),
            'nama_produk'   => $request->NamaProduk,
            'desk_produk'   => $request->Deskripsi,
            'foto_produk'   => $fotoName,
            'visib_produk'  => $request->visibilitas,
            'created_by'    => Auth::user()->email,
            'modified_by'   => Auth::user()->email,
        ]);

        //redirect to index
        return redirect()->route('produk.tambah')->with(['success' => 'Produk Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            $detailP = Produk::findOrFail($id),
            'judul' => $detailP->nama_produk,
            'DetailProduk' => Produk::findOrFail($id),
            $latestCP = CP::where('visib_cp', 'Tampilkan')->latest()->first(),
            $cp = $latestCP,
            'CP' => CP::findOrFail($cp->id_cp),
        ];
        return view('pages.public.produk_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'judul' => 'Edit Produk',
            'EditProduk' => Produk::findOrFail($id),
        ];
        return view('pages.admin.v_produk_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'NamaProduk'    => 'required|max:255',
            'Foto'          => 'image|mimes:jpeg,jpg,png|max:3072',
            'Deskripsi'     => 'required',
        ]);

        //get by ID
        $produk = Produk::findOrFail($id);

        //cek gambar di upload
        if ($request->hasFile('Foto')) {
            //delete image
            $produk_path = 'assets/img/produk/' . $produk->foto_produk;
            if (file_exists($produk_path)) {
                unlink($produk_path);
            }
            //upload image
            $foto = $request->file('Foto');
            $fotoName = time().Str::random(9).'.'.$foto->getClientOriginalExtension();
            $foto->move('assets/img/produk', $fotoName);

            //update
            $produk->update([
                'nama_produk'   => $request->NamaProduk,
                'desk_produk'   => $request->Deskripsi,
                'foto_produk'   => $fotoName,
                'visib_produk'  => $request->visibilitas,
                'modified_by'   => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('produk.data')->with(['success' => 'Produk Berhasil Diperbarui!']);
        }else{
            //update
            $produk->update([
                'nama_produk'   => $request->NamaProduk,
                'desk_produk'   => $request->Deskripsi,
                'visib_produk'  => $request->visibilitas,
                'modified_by'   => Auth::user()->email,
            ]);

            //redirect to index
            return redirect()->route('produk.data')->with(['success' => 'Produk Berhasil Diperbarui!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $produk = Produk::findOrFail($id);

        //delete image
        $produk_path = 'assets/img/produk/' . $produk->foto_produk;
        if (file_exists($produk_path)) {
            unlink($produk_path);
        }

        //delete
        $produk->delete();

        //redirect to index
        return redirect()->route('produk.data')->with(['success' => 'Produk Berhasil Dihapus!']);
    }
}
