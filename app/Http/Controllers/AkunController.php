<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return view('account.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Akun $akun)
    {
        return view('account.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, akun $akun)
    {
        $data = $request->validate(
            [
                'username' => 'required',
                'Level' => 'required',
                'password' => 'required',
            ]
        );
        $insert = $akun->create($data);

            if ($insert) {
                return redirect('account/data')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
            }
            return back()->with('error','Pendaftaran Gagal Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Akun $akun,Request $request)
    {
        {
            $data = [
                'Akun' => Akun::where('id_Akun', $request->id)->first()
            ];
            return view('account.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id_akun = $request->input('id_akun');

        $data = $request->validate([
            'username' => 'sometimes',
            'level' => 'sometimes',
            'password' => 'sometimes',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Akun $akun)
    {
        {
            $id_akun = $request->input('id_akun');
            $aksi = $akun->where('id_akun', $id_akun)->delete();
                if($aksi)
                {
                    $pesan = [
                        'success' => true,
                        'pesan'   => 'akun berhasil dihapus'
                    ];
                }else
                {
                    $pesan = [
                        'success' => false,
                        'pesan'   => 'akun gagal dihapus'
                    ];
                }
                return response()->json($pesan);
    
        }
    }
}
