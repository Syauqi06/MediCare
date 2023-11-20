<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pendaftaran' => DB::table('pendaftaran')
            ->join('pasien', 'pendaftaran.id_pasien', '=', 'pasien.id_pasien')
            ->get()
        ];

        return view('pendaftaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pasien $pasien)
    {
        $pasien = $pasien->all();

        return view('pendaftaran.tambah', [
            'pasien' => $pasien,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Pendaftaran $pendaftaran)
    {
        $data = $request->validate([
            'tgl_pendaftaran' => 'required',
            'id_pasien' => 'required',
            'keluhan' => 'required',
        ]);
        
        // $user = Auth::user();
        // $data['id_user'] = $user->id_user;
        if ($pendaftaran->create($data)) {
            return redirect('/pendaftaran/data')->with('success', 'Data pendaftaran baru berhasil ditambah');
        }

        return back()->with('error', 'Data pendaftaran gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Pendaftaran $pendaftaran,Pasien $pasien)
    {
        $pasien = Pasien::where('id_pasien', $id)->first();
        $pasien = $pasien->all();

        return view('pendaftaran.edit', [
            'pendaftaran' => $pendaftaran,
            'pasien' => $pasien,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');

        $data = $request->validate([
            'tgl_pendaftaran' => 'sometimes',
            'id_pasien' => 'sometimes',
            'keluhan' => 'sometimes|file',
        ]);
        $dataUpdate = $pendaftaran->where('id_pendaftaran', $id_pendaftaran)->update($data);

            if ($dataUpdate) {
                return redirect('pendaftaran/data')->with('success', 'Data pendaftaran berhasil diupdate');
            }

            return back()->with('error', 'Data pendaftaran gagal diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran, Request $request)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');
        $aksi = $pendaftaran->where('id_pendaftaran', $id_pendaftaran)->delete();

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
