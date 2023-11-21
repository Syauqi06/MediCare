<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Dokter;
use App\Models\RekamMedis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    //Data diambil dari model
    protected $pendaftaranModel;
    protected $dokterModel;
    public function __construct()
    {
        $this->pendaftaranModel = new Pendaftaran;   
        $this->dokterModel = new Dokter;    
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index(RekamMedis $rekam)
    {
        $data = [
            'rekam_medis' => DB::table('rekam_medis')->get(),
        ];
        return view('rekam.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(Pendaftaran $pendaftaran, Dokter $dokter)
    {
    $data = [
        'pendaftaran' => $this->pendaftaranModel->all(),
        'dokter' => $this->dokterModel->all()
    ];
        return view('rekam.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RekamMedis $rekam)
    {
        $data = $request->validate(
            [
                'id_dokter' => 'required',
                'id_asdok' => 'required',
                'id_pendaftaran' => 'required',
                'diagnosa' => 'required',
                'tgl_pemeriksaan' => 'required',
            ]
        );

        if ($rekam->create($data)) {
            return redirect('rekam/asisten')->with('success', 'Rekam Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekam, string $id, Pendaftaran $pendaftaran, Dokter $dokter)
    {
        $data = [
            'rekam_medis' =>  RekamMedis::where('no_rm', $id)->first(),
            'pendaftaran' => $this->pendaftaranModel->all(),
            'dokter' => $this->dokterModel->all()
        ];

        return view('rekam.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekam)
    {
        $data = $request->validate(
            [
                'id_dokter' => 'required',
                'id_asdok' => 'required',
                'id_pendaftaran' => 'required',
                'diagnosa' => 'required',
                'tgl_pemeriksaan' => 'required',
            ]
        );

        $id_rm = $request->input('id_rm');

        if ($id_rm !== null) {
            // Process Update
            $dataUpdate = $rekam->where('id_rm', $id_rm)->update($data);

            if ($dataUpdate) {

                return redirect('rekam/asisten')->with('success', 'Rekam Medis Berhasil Diupdate');
            } else {
                return back()->with('error', 'Rekam Medis Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, RekamMedis $rekam)
    {
        $id_rm = $request->input('id_rm');

        // Hapus 
        $aksi = $rekam->where('id_rm', $id_rm)->delete();

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