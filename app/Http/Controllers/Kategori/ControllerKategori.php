<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Model\ModelKategori\ModelKategori;
use Illuminate\Http\Request;

class ControllerKategori extends Controller
{
    //

    // function untuk menampilkan semua konser
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $kategori = ModelKategori::where('nama_kategori', 'LIKE', "%{$search}%")->orWhere('keterangan', 'LIKE', "%{$search}%")->get();
        } else {
            $kategori = ModelKategori::all();
        }
        // menganbil semua catatan dari tabel kategori
        return view('kategori.index', ['kategori' => $kategori, 'search' => $search]);
    }

    // mengambil data kategori bedasarkan id
    public function show($id)
    {
        // $kategori = ModelKategori::findOrFail($id);  // Akan mencari berdasarkan primary key yang disetel di model
        return view('kategori.show', ['kategori' => ModelKategori::findOrFail($id)]);
    }

    // tambah kategori
    public function create()
    {
        $latestKategori = ModelKategori::latest('id_kategori')->first();
        $latestKategoriId = $latestKategori ? $latestKategori->id_kategori + 1 : 1;
        return view('kategori.create', ['latestKategoriId' => $latestKategoriId]);
    }

    //metode untuk menyimpan kategori baru
    public function store(Request $request)
    {
        //Validasi data
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);

        ModelKategori::create($validated);
        return redirect()->route('kategori.index')->with([
            'success' => 'Berhasil membuat kategori ' . $request->nama_kategori
        ]);
    }
    public function edit($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        return view('kategori.edit', ['kategori' => $kategori]);
    }
    public function update(Request $request, $id)
    {
        //Validasi data
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255'
        ]);
        $kategori = ModelKategori::findOrFail($id);
        $kategori->update($validated);
        return redirect()->route('kategori.index')->with('success', 'Berhasil update kategori');
    }
    public function destroy($id)
    {
        // $kategori = ModelKategori::findOrFail($id);
        // $kategori->delete();
        ModelKategori::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Berhasil hapus kategori');
    }
}
