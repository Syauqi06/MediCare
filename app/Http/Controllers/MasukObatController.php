<?php

namespace App\Http\Controllers;


use App\Models\MasukObat;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasukObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MasukObat $masukObat)
    {
        $data = [
            'masuk_obat' => DB::table('masuk_obat')
            ->join('obat', 'masuk_obat.id_obat', '=', 'obat.id_obat')
            ->get()
        ];

        return view('masuk_obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Obat $obat)
    {
        $obatData = $obat->all();

        return view('masuk_obat.tambah', [
            'obat' => $obatData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, MasukObat $masukObat)
    {
        $data = $request->validate([
            'tgl_expired' => 'required',
            'id_obat' => 'required',
            'tgl_masuk_obat' => 'required',
            'jumlah_masuk' => 'required',
        ]);

        // $user = Auth::user();
        // $data['id_user'] = $user->id_user;
        if ($masukObat->create($data)) {
            return redirect('/apoteker/masuk_obat')->with('success', 'Data masuk obat baru berhasil ditambah');
        }

        return back()->with('error', 'Data masuk obat gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasukObat $masukObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasukObat $masukObat,string $id,Obat $obat)
    {
        $masukObat = MasukObat::where('id_masuk_obat', $id)->first();
        $obatData = $obat->all();

        return view('masuk_obat.edit', [
            'masuk_obat' => $masukObat,
            'obatData' => $obatData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasukObat $masukObat)
    {
        $id_masuk_obat = $request->input('id_masuk_obat');

        $data = $request->validate([
            'tgl_expired' => 'sometimes',
            'id_obat' => 'sometimes',
            'tgl_masuk_obat' => 'sometimes',
            'jumlah_masuk' => 'sometimes',
        ]);
        // dd($data);
        if ($id_masuk_obat !== null) {
            $dataUpdate = $masukObat->where('id_masuk_obat', $id_masuk_obat)->update($data);
            if ($dataUpdate) {
                return redirect('apoteker/masuk_obat')->with('success', 'Data obat berhasil diupdate');
            }

            return back()->with('error', 'Data obat gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasukObat $masukObat,Request $request)
    {
        $id_masuk_obat = $request->input('id_masuk_obat');

        // Hapus 
        $aksi  = $masukObat->where('id_masuk_obat', $id_masuk_obat)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data Obat Berhasil Dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
