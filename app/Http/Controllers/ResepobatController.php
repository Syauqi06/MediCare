<?php

namespace App\Http\Controllers;

use App\Models\Resepobat;
use App\Models\IsiResep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Resepobat $resep)
    {
        $data = [
            'resep' => $resep->with('isi_resep')->get()
        ];

        return view('resep_obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(IsiResep $isi_resep)
    {
        $isi_resep = $isi_resep->all();

        return view('resep_obat.tambah', [
            'isi_resep' => $isi_resep,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Resepobat $resep)
    {
        $data = $request->validate([
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pemakaian' => 'required',
            'tanggal_pembuatan' => 'required',
            'status_pengambilan' => 'required'
        ]);

        // $akun = Auth::user();
        // $data['id_akun'] = $akun->id_akun;

        // if ($request->hasFile('file')) {
        //     $foto_file = $request->file('file');
        //     $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
        //     $foto_file->move(public_path('foto'), $foto_nama);
        //     $data['file'] = $foto_nama;
        // }

        if ($resep->create($data)) {
            return redirect('/resep_obat/resep')->with('success', 'Data resep baru berhasil ditambah');
        }

        return back()->with('error', 'Data resep gagal ditambahkan');
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
    public function edit(string $id,Resepobat $resep, IsiResep $isiresep)
    {
        $resep = Resepobat::where('id_surat', $id)->first();
        $isiresep = $isiresep->all();

        return view('resep_obat.edit', [
            'resep' => $resep,
            'isiresep' => $isiresep,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resepobat $resep)
    {
        $id_resep = $request->input('id_resep');

        $data = $request->validate([
            'id_obat' => 'required',
            'dosis' => 'required',
            'aturan_pemakaian' => 'required',
            'tanggal_pembuatan' => 'required',
            'status_pengambilan' => 'required'
        ]);

        if ($id_resep !== null) {
            // if ($request->hasFile('file')) {
            //     $foto_file = $request->file('file');
            //     $foto_extension = $foto_file->getClientOriginalExtension();
            //     $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
            //     $foto_file->move(public_path('foto'), $foto_nama);

            //     $update_data = $surat->where('id_surat', $id_surat)->first();
            //     File::delete(public_path('foto') . '/' . $update_data->file);

            //     $data['file'] = $foto_nama;
            // }

            $dataUpdate = $resep->where('id_resep', $id_resep)->update($data);

            if ($dataUpdate) {
                return redirect('resep_obat/resep')->with('success', 'Data resep berhasil diupdate');
            }

            return back()->with('error', 'Data resep gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,Resepobat $resepobat)
    {
        $id_resep = $request->input('id_resep');
        $data = Resepobat::find($id_resep);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        // $filePath = public_path('foto') . '/' . $data->file;

        // if (file_exists($filePath) && unlink($filePath)) {
        //     $data->delete();
        //     return response()->json(['success' => true]);
        // }

        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
    }
}
