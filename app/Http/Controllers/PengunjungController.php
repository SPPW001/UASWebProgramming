<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PengunjungController extends Controller
{
    public function index(?string $kategori = null)
    {
        $kategoriAktif = null;

        $artikelQuery = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc');

        if ($kategori !== null) {
            $kategoriAktif = KategoriArtikel::findOrFail($kategori);
            $artikelQuery->where('id_kategori', $kategoriAktif->id);
        }

        $artikel = $artikelQuery->take(5)->get();
        $kategoriArtikel = $this->kategoriWidget();

        return view('pengunjung.index', compact('artikel', 'kategoriArtikel', 'kategoriAktif'));
    }

    public function detail(string $id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        $artikelTerkait = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('pengunjung.detail', compact('artikel', 'artikelTerkait'));
    }

    private function kategoriWidget()
    {
        return KategoriArtikel::withCount('artikel')
            ->orderBy('nama_kategori', 'asc')
            ->get();
    }
}
