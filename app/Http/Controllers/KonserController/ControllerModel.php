<?php

namespace App\Http\Controllers\KonserController;

use App\Http\Controllers\Controller;
use App\Models\Model\ModelKonser\ModelKonser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ControllerModel extends Controller
{
    // function untuk menampilkan semua konser
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $konser = ModelKonser::where('nama_konser', 'LIKE', "%{$search}%")->orWhere('lokasi', 'LIKE', "%{$search}%")->get();
        } else {
            $konser = ModelKonser::all();
        }
        // menganbil semua catatan dari tabel konser
        return view('konser.index', ['konser' => $konser, 'search' => $search]);
    }

    // mengambil data konser bedasarkan id
    public function show($id)
    {
        $konser = ModelKonser::findOrFail($id);  // Akan mencari berdasarkan primary key yang disetel di model
        return view('konser.show', ['konser' => $konser]);
    }

    // tambah konser
    public function create()
    {
        $latestKonser = ModelKonser::latest('id_konser')->first();
        $latestKonserId = $latestKonser ? $latestKonser->id_konser + 1 : 1;
        return view('konser.create', ['latestKonserId' => $latestKonserId]);
    }

    //metode untuk menyimpan konser baru
    public function store(Request $request)
    {
        //Validasi data
        $validated = $request->validate([
            'nama_konser' => 'required|string|max:255',
            'jumlah_tiket' => 'required|integer',
            'tanggal_konser' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);
        ModelKonser::create($validated);
        return redirect()->route('konser.index')->with([
            'success' => 'Berhasil membuat konser '.$request->nama_konser
        ]);
    }
    public function edit($id)
    {
        $konser = ModelKonser::findOrFail($id);
        return view('konser.edit', ['konser' => $konser]);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_konser' => 'required|string|max:255',
            'jumlah_tiket' => 'required|integer',
            'tanggal_konser' => 'required|date',
            'lokasi' => 'required|string|max:255'
        ]);
        $konser = ModelKonser::findOrFail($id);
        $konser->update($validated);
        return redirect()->route('konser.index')->with('success', 'Berhasil update konser '.$konser->nama_konser);
    }
    public function destroy($id)
    {
        $konser = ModelKonser::findOrFail($id);
        $namaKonser = $konser->nama_konser;
        $konser->delete();
        return redirect()->route('konser.index')->with([
            'success'=> 'Berhasil hapus konser '.$namaKonser
        ]);
    }
}
