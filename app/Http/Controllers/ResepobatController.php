<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\RekamMedis;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResepObat $resep)
    {
        // Mengirim data agar ditampilkan ke dalam view dengan isi array data resep
        $data = [
            'resepobat' => DB::table('resepobat')
            ->join('rekam_medis', 'resepobat.id_rm', '=', 'rekam_medis.id_rm')
            ->join('dokter', 'resepobat.id_rm', '=', 'dokter.id_rm')
            ->get()
        ];
        return view('resep.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(RekamMedis $rekamMedis, Dokter $dokter)
    {
        $rekamData = $rekamMedis->all();
        $dokterData = $dokter->all();

        return view('resep.tambah', [
            'rekam_medis' => $rekamData,
            'dokter' => $dokterData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ResepObat $resep)
    {
        $data = $request->validate(
            [
                'nama_pasien'    => 'required',
                'tgl_pelayanan'    => 'required',
                'diagnosis'      => 'required',
                'nama_obat'    => 'required',
            ]
        );

        //Proses Insert

        if ($resep->create($data)) {
            return redirect('/resep/asisten')->with('success', 'resep Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResepObat $resep, string $id)
    {
        $data = [
            'resep' =>  ResepObat::where('id_resep', $id)->first()
        ];

        return view('resep.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResepObat $resep)
    {
        $data = $request->validate(
            [
                'nama_pasien'    => 'required',
                'tgl_pelayanan'    => 'required',
                'diagnosis'      => 'required',
                'nama_obat'    => 'required',
            ]
        );

        $id_resep = $request->input('id_resep');

        if ($id_resep !== null) {
            // Process Update
            $dataUpdate = $resep->where('id_resep', $id_resep)->update($data);

            if ($dataUpdate) {
                return redirect('/resep/asisten')->with('success', 'resep Medis Berhasil Diupdate');
            } else {
                return back()->with('error', 'resep Medis Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, ResepObat $resep)
    {
        $id_resep = $request->input('id_resep');

        // Hapus 
        $aksi = $resep->where('id_resep', $id_resep)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data jenis surat berhasil dihapus'
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