<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\CP;
use App\Models\Harga;
use App\Models\Produk;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    //Fungsi untuk halaman beranda
    public function beranda()
    {
        return view('pages.public.beranda', [
            'judul' => 'Beranda',
            'Produk' => Produk::where('visib_produk', 'Tampilkan')->latest()->limit(3)->get(),
            'Harga' => Harga::where('visib_harga', 'Tampilkan')->orderBy('nominal_harga')->get(),
        ]);
    }

    //Fungsi untuk halaman produk
    public function produk()
    {
        return view('pages.public.produk', [
            'judul' => 'Produk',
            'Produk' => Produk::where('visib_produk', 'Tampilkan')->latest()->get(),
        ]);
    }

    //Fungsi untuk halaman berita
    public function berita()
    {
        return view('pages.public.berita', [
            'judul' => 'Berita',
            'Berita' => Berita::where('visib_berita', 'Tampilkan')->latest()->get(),
        ]);
    }

    //Fungsi untuk halaman tentang
    public function tentang()
    {
        return view('pages.public.tentang', [
            'judul' => 'Tentang',
        ]);
    }

    //Fungsi untuk halaman kontak
    public function kontak()
    {
        return view('pages.public.kontak', [
            'judul' => 'Kontak',
            'CP' => CP::where('visib_cp', 'Tampilkan')->latest()->get(),
        ]);
    }

    //Fungsi untuk halaman coming
    public function coming()
    {
        return view('pages.public.coming', [
            'judul' =>  'Coming Soon',
        ]);
    }
}
