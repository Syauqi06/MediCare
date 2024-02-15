<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPoli = DB::select('SELECT CountTotalPoli() AS totalPoli')[0]->totalPoli;

        $data = [
            'poli' => DB::table('view_poli')->get(),
            'jumlahPoli' => $totalPoli
        ];
        return view('poli.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('poli.tambah');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Poli $poli)
    {
        $data = $request->validate(
            [
                'jenis_poli' => 'required',
            ]
        );

        if (DB::statement("CALL CreatePoli(?)", [$data['jenis_poli']])) {
            return redirect('asisten/daftar/poli')->with('success', 'Data Poli Baru Berhasil Ditambah');
        }
        
        return back()->with('error', 'Data Poli Gagal Ditambahkan');
    }


    /**
     * Display the specified resource.
     */

    // public function show(Poli $poli)
    // {
    //     //
    // }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Poli $poli, Request $request)
    {
        $data = [
            'poli' => Poli::where('id_poli', $request->id)->first()
        ];
        return view('poli.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        $data = $request->validate([
            'jenis_poli' => 'required',
        ]);

        $id_poli = $request->input('id_poli');

        if ($id_poli !==null){

            $dataUpdate = $poli->where('id_poli', $id_poli)->update($data);

            if($dataUpdate) {
                return redirect('asisten/daftar/poli')->with('success', 'Data Poli Berhasil Diupdate');
            }
        }

            return back()->with('error', 'Data Poli Gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Poli $poli, Request $request)

    {
        $id_poli = $request->input('id_poli');

        // Hapus 
        $aksi = $poli->where('id_poli', $id_poli)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data Poli Berhasil Dihapus'
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