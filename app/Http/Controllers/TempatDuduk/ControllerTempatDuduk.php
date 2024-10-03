<?php

namespace App\Http\Controllers\TempatDuduk;

use App\Http\Controllers\Controller;
use App\Models\Model\ModelKategori\ModelKategori;
use App\Models\Model\ModelKonser\ModelKonser;
use App\Models\Model\ModelTempatDuduk\ModelTempatDuduk;
use Illuminate\Contracts\Database\ModelIdentifier;
use Illuminate\Http\Request;

class ControllerTempatDuduk extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $tempatDuduk = ModelTempatDuduk::where('nomor_tempat', 'LIKE', "%{$search}%")->orWhere('status_pemesanan', 'LIKE', "%{$search}%")->orWhere('harga', 'LIKE', "%{$search}%")->get();
        } else {
            $tempatDuduk = ModelTempatDuduk::all();
        }
        $modelKonser = new ModelKonser;
        $modelKategori = new ModelKategori;
        // menganbil semua catatan dari tabel konser
        return view('tempat-duduk.index', compact('tempatDuduk', 'modelKonser', 'modelKategori', 'search'));
    }
    public function create()
    {
        $konser = ModelKonser::all();
        $kategori = ModelKategori::all();
        $latestTempatDuduk = ModelTempatDuduk::latest('id_tempat_duduk')->first();
        $latestTempatDudukId = $latestTempatDuduk ? $latestTempatDuduk->id_kategori + 1 : 1;
        return view('tempat-duduk.create', compact('konser', 'kategori', 'latestTempatDudukId'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_konser' => 'required|integer|exists:konser,id_konser',
            'id_kategori' => 'required|integer|exists:kategori_tempat_duduk,id_kategori',
            'nomor_tempat' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'status_pemesanan' => 'required|in:Tersedia,Dipesan,Dibayar'
        ]);
        ModelTempatDuduk::create($validated);
        return redirect()->route('tempat-duduk.index')->with([
            'success' => 'Berhasil membuat Tempat Duduk ' . $request->nama_konser
        ]);
    }
    public function show($id)
    {
        $namaKonser = ModelKonser::find(ModelTempatDuduk::find($id)->id_konser)->nama_konser ?? 'Konser Hilang / Tidak Ada';
        $namaKategori = ModelKategori::find(ModelTempatDuduk::find($id)->id_kategori)->nama_kategori ?? 'Kategori Hilang / Tidak Ada';
        $tempatDuduk = ModelTempatDuduk::findOrFail($id);
        return view('tempat-duduk.show', compact('namaKonser', 'namaKategori', 'tempatDuduk'));
    }
    public function edit($id)
    {
        $tempatDuduk = ModelTempatDuduk::findOrFail($id);
        $konser = ModelKonser::all();
        $namaKonser = ModelKonser::find(ModelTempatDuduk::find($id)->id_konser)->nama_konser ?? 'Konser Hilang / Tidak Ada';
        $namaKategori = ModelKategori::find(ModelTempatDuduk::find($id)->id_kategori)->nama_kategori ?? 'Kategori Hilang / Tidak Ada';
        return view('tempat-duduk.edit', compact('tempatDuduk', 'konser', 'namaKonser', 'namaKategori'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_tempat' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'status_pemesanan' => 'required|in:Tersedia,Dipesan,Dibayar'
        ]);
        $tempatDuduk = ModelTempatDuduk::findOrFail($id);
        $tempatDuduk->update($validated);
        return redirect()->route('tempat-duduk.index')->with('success', 'Tempat duduk berhasil diubah');
    }
    public function destroy($id)
    {
        // $tempat_duduk = ModelTempatDuduk::findOrFail($id);
        // $tempat_duduk->delete();
        ModelTempatDuduk::findOrFail($id)->delete();
        return redirect()->route('tempat-duduk.index')->with('success', 'Berhasil hapus kategori');
    }
}
