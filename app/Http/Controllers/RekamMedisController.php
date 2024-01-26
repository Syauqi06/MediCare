<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    //Data diambil dari model
    protected $pasienModel;
    protected $dokterModel;
    public function __construct()
    {
        $this->pasienModel = new Pasien;   
        $this->dokterModel = new Dokter;    
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index(RekamMedis $rekam)
    {
        $data = [
            'rekam_medis' => DB::table('rekam_medis')
            ->join('pasien', 'rekam_medis.id_pasien', '=', 'pasien.id_pasien')
            ->join('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id_dokter')
            ->get(),
            // 'jumlahObat' => $totalObat
        ];
        // $data = [
        //     'rekam_medis' => DB::table('rekam_medis')
        //     ->join('pasien', 'pasien.id_pasien', '=', 'p.id_pasien')
        //     ->join('dokter', 'dokter.id_dokter', '=', 'dokter.id_dokter')
        //     ->get()
        // ];
        return view('rekam.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(Pasien $pasien, Dokter $dokter)
    {
    $data = [
        'pasien' => $this->pasienModel->all(),
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
                'id_pasien' => 'required',
                'id_dokter' => 'required',
                'diagnosa' => 'required',
                'tgl_pemeriksaan' => 'required',
            ]
        );

        if ($rekam->create($data)) {
            return redirect('asisten/data-rekam/rekam')->with('success', 'Rekam Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Rekam Medis Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(RekamMedis $rekam, string $id, Pasien $pasien, Dokter $dokter)

    {
        // $data = [   
        //     'rekam_medis' =>  RekamMedis::where('id_rm', $id)->first(),
        //     'pasien' => $this->pasienModel->all(),
        //     'dokter' => $this->dokterModel->all()
        // ];

        // return view('rekam.edit', $data);
        $rekamData = RekamMedis::where('id_rm', $id)->first();
        $pasienData = $pasien->all();
        $dokterData = $dokter->all();

        return view('rekam.edit', [
            'rekam' => $rekamData,
            'pasien' => $pasienData,
            'dokter' => $dokterData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, RekamMedis $rekam)

    {
        $data = $request->validate(
            [
                'id_pasien' => 'required',
                'id_dokter' => 'required',
                'tgl_pemeriksaan' => 'required',
                'diagnosa' => 'required',
            ]
        );

        $id_rm = $request->input('id_rm');

        if ($id_rm !== null) {
            // Process Update
            $dataUpdate = $rekam->where('id_rm', $id_rm)->update($data);

            if ($dataUpdate) {

                return redirect('asisten/data-rekam/rekam')->with('success', 'Rekam Medis Berhasil Diupdate');
            } else {
                return back()->with('error', 'Rekam Medis Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy( RekamMedis $rekam,Request $request)

    {
        $id_rm = $request->input('id_rm');

        // Hapus 
        $aksi = $rekam->where('id_rm', $id_rm)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data rekam medis berhasil dihapus'
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