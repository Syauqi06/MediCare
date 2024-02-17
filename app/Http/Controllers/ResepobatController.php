<?php

namespace App\Http\Controllers;


use App\Models\Tipe;
use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Resepobat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
    protected $rekamModel;
    protected $dokterModel;
    protected $tipeModel;
    public function __construct()
    {
        $this->rekamModel = new RekamMedis;   
        $this->dokterModel = new Dokter; 
        $this->tipeModel = new Tipe; 
    }
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        $totalResep = DB::select('SELECT CountTotalResep() AS totalResep')[0]->totalResep;
         $data = [
             'resep_obat' => DB::table('view_resep')->get(),
             'jumlahResep' => $totalResep
         ];
     
         return view('resep.index', $data);
     }


    /**
     * Show the form for creating a new resource.
     */


    public function create(RekamMedis $rekamMedis, Dokter $dokter, Tipe $tipe)
    {
        $data = [
            'rekam_medis' => $this->rekamModel->all(),
            'dokter' => $this->dokterModel->all(),
            'tipe' => $this->tipeModel->all()
        ];
        // $rekamData = $rekamMedis->all();
        // $dokterData = $dokter->all();
        // $tipeData = $tipe->all();

        return view('resep.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, ResepObat $resep)
    {
        $data = $request->validate(
            [
                'id_rm'    => 'required',
                'id_dokter'    => 'required',
                'id_tipe'    => 'required',
                'tgl_pembuatan_resep'      => 'required',
                'status_pengambilan_obat'    => 'required',
            ]
        );

        //Proses Insert
        if (DB::statement("CALL CreateResepObat(?,?,?,?,?)", [$data['id_rm'], $data['id_dokter'], $data['id_tipe'], $data['tgl_pembuatan_resep'], $data['status_pengambilan_obat']])) {
            return redirect('asisten/data-resep/resep')->with('success', 'Resep Obat Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Resep Obat Gagal Ditambahkan');

    }

    public function detail(string $id, Resepobat $resep)
    {
        $resepObat = Resepobat::where('id_resep', $id)
            ->join('rekam_medis', 'resep_obat.id_rm', '=', 'rekam_medis.id_rm')
            ->join('dokter', 'resep_obat.id_dokter', '=', 'dokter.id_dokter')
            ->join('tipe', 'resep_obat.id_tipe', '=', 'tipe.id_tipe')
            ->first();

        return view('resep.detail', [
            'resep' => $resepObat,
        ]);
    }
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */

     public function edit(Resepobat $resep,Tipe $tipe, string $id, Dokter $dokter, RekamMedis $rekam)
    {
        // $data = [
        //     'resep' => Resepobat::where('id_resep', $id)->first(),
        //     'tipe' => $tipe->all(),
        //     'dokter' => $dokter->all(),
        // ];
    
        // return view('resep.edit', $data);
        $resepObat = Resepobat::where('id_resep', $id)->first();
        $tipeObat = $tipe->all();
        $dokterData = $dokter->all();
        $rekamData = $rekam->all();

        return view('resep.edit', [
            'resep' => $resepObat,
            'tipe' => $tipeObat,
            'dokter' => $dokterData,
            'rekam' => $rekamData,
        ]);
    }
    // public function edit(ResepObat $resep, string $id, RekamMedis $rekam, Dokter $dokter, Tipe $tipe)
    // {
    //     // $resepData = Resepobat::where('id_resep', $id)->first();
    //     // $rekamData = $rekam->all();
    //     // $dokterData = $dokter->all();
    //     // $tipeData = $tipe->all();
    //     $data = [
    //         'resep' =>  ResepObat::where('id_resep', $id)->first(),
    //         'rekam_medis' => $this->rekamModel->all(),
    //         'dokter' => $this->dokterModel->all(),
    //         'tipe' => $this->tipeModel->all()
    //     ];

    //     return view('resep.edit', $data);
    //     //     'resep' => $resepData,
    //     //     'rekam_medis' => $rekamData,
    //     //     'dokter' => $dokterData,
    //     //     'tipe' => $tipeData,
    //     // ]);

    // }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, ResepObat $resep)
    {
        $data = $request->validate(
            [
                'id_rm'    => 'required',
                'id_dokter'    => 'required',
                'id_tipe'    => 'required',
                'tgl_pembuatan_resep'      => 'required',
                'status_pengambilan_obat'    => 'required',
            ]
        );

        $id_resep = $request->input('id_resep');

        if ($id_resep !== null) {
            // Process Update
            $dataUpdate = $resep->where('id_resep', $id_resep)->update($data);

            if ($dataUpdate) {
                return redirect('asisten/data-resep/resep')->with('success', 'resep obat Berhasil Diupdate');
            } else {
                return back()->with('error', 'resep obat Gagal Diupdate');
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
                'pesan'   => 'Data resep obat berhasil dihapus'
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

    public function unduh(Resepobat $resep)
    {
        $resepObat = $resep
            ->join('rekam_medis', 'resep_obat.id_rm', '=', 'rekam_medis.id_rm')
            ->join('dokter', 'resep_obat.id_dokter', '=', 'dokter.id_dokter')
            ->join('tipe', 'resep_obat.id_tipe', '=', 'tipe.id_tipe')
            ->get();
            
        $pdf = PDF::loadView('resep.cetak', ['resep' => $resepObat]);
        return $pdf->download('resep-obat.pdf');
    }
}