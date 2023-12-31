<?php

namespace App\Http\Controllers;


use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DokterController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Dokter;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Dokter $dokter)
    {
    $data = [
        'dokter' => DB::table('dokter')
        ->join('poli', 'dokter.id_poli', '=', 'poli.id_poli')
        ->get()
    ];
    return view ('dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Poli $poli)
    {
        $poliData = $poli->all();

        return view('dokter.tambah', [
            'poli' => $poliData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dokter $dokter)
    {
          
        // data dari form di view yang dikumpulkan berbentuk array akan di filter sesuai validasi yang ditentukan
        $data = $request->validate(
            [
                'nama_dokter' => 'required',
                'id_poli' => 'required',
                'no_telp' => 'required',
                'foto_dokter' => 'sometimes',
            ]
            );

            if ($request->hasFile('foto_dokter') && $request->file('foto_dokter')->isValid()) {
                $foto_file = $request->file('foto_dokter');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $data['foto_dokter'] = $foto_nama;
            }

            if(Dokter::create($data))
            {
                return redirect()->to('/dashboard/dokter')->with("success", "Data Dokter Berhasil Ditambahkan");
            }else
            {
                return back()->with("error","Data Dokter Gagal Ditambahkan");
            }
        }

    
    /**
     * Display the specified resource.
     */

    public function show()

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Dokter $dokter, Request $request)

    {
        $data = [
            'dokter' => Dokter::where('id_dokter', $request->id)->first()
        ];
        return view('dokter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $id_dokter = $request->input('id_dokter');

        $data = $request->validate([
            'nama_dokter' => 'sometimes',
            'id_poli' => 'sometimes',
            'no_telp' => 'sometimes',
            'foto_dokter' => 'sometimes',
        ]);

        if ($id_dokter !==null){
            if ($request->hasFile('foto_dokter')){
                $foto_file = $request->file('foto_dokter');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama= md5($foto_file->getClientOriginalName() . time()) . ' .' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);            

                $update_data = $dokter->where('id_dokter', $id_dokter)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_dokter'] = $foto_nama;
            }

            $dataUpdate = $dokter->where('id_dokter', $id_dokter)->update($data);

            if($dataUpdate) {
                return redirect('dashboard/dokter')->with('success', 'Data berhasil diupdate');
            }
        }

        return back()->with('error', 'Data Gagal diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, Dokter $dokter)

    {
        $id_dokter = $request->input('id_dokter');
        $aksi = $dokter->where('id_dokter', $id_dokter)->delete();
            if($aksi)
            {
                $pesan = [
                    'success' => true,
                    'pesan'   => 'Pendaftaran Dokter berhasil dihapus'
                ];
            }else
            {
                $pesan = [
                    'success' => false,
                    'pesan'   => 'Pendaftaran Dokter gagal dihapus'
                ];
            }
            return response()->json($pesan);

    }
}