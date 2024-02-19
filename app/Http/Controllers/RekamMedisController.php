<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $totalRekam = DB::select('SELECT CountTotalRekamMedis() AS totalRekam')[0]->totalRekam;

        $data = [
            'rekam_medis' => DB::table('view_rekam_medis')->get(),
            'jumlahRekam' => $totalRekam
        ];

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

        if (DB::statement("CALL CreateRekamMedis(?,?,?,?)", 
            [$data['id_pasien'], 
            $data['id_dokter'], 
            $data['diagnosa'], 
            $data['tgl_pemeriksaan']])) 
        {
            return redirect('asisten/data-rekam/rekam')->with('success', 'Rekam Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Rekam Medis Gagal Ditambahkan');
    }

    public function detail(string $id, RekamMedis $rekamMedis)
    {
        $rekamData = RekamMedis::where('id_rm', $id)
            ->join('pasien', 'rekam_medis.id_pasien', '=', 'pasien.id_pasien')
            ->join('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id_dokter')
            ->first();

        return view('rekam.detail', [
            'rekam' => $rekamData,
        ]);
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

    public function destroy(RekamMedis $rekam, Request $request)

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

    public function unduh(RekamMedis $rekamMedis)
    {
        $rekamData = $rekamMedis
            ->join('pasien', 'rekam_medis.id_pasien', '=', 'pasien.id_pasien')
            ->join('dokter', 'rekam_medis.id_dokter', '=', 'dokter.id_dokter')
            ->get();

        $pdf = PDF::loadView('rekam.cetak', ['rekam' => $rekamData]);
        return $pdf->download('rekam-medis.pdf');
    }
}
