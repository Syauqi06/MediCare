<?php

namespace App\Http\Controllers;


use App\Models\Obat;
use App\Models\Tipe;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\File;

class ObatController extends Controller
{
    protected $TipeModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Obat $obat)
    {
        $totalObat = DB::select('SELECT CountTotalObat() AS totalObat')[0]->totalObat;
        $data = [
            'obat' => DB::table('obat')->join('tipe', 'obat.id_tipe', '=', 'tipe.id_tipe')->get(),
            'jumlahObat' => $totalObat
        ];

        return view('obat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tipe $tipe)
    {
        $tipeData = $tipe->all();

        return view('obat.tambah', [
            'tipe' => $tipeData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Obat $obat)
    {
        $data = $request->validate([
            'nama_obat' => 'required',
            'id_tipe' => 'required',
            'stock_obat' => 'required',
            'foto_obat' => 'required|file',
        ]);
        if ($request->hasFile('foto_obat')) {
            $foto_file = $request->file('foto_obat');
            $foto_obat = base64_encode($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_obat);
            $data['foto_obat'] = $foto_obat;
        }

        if (DB::statement("CALL CreateObat(?,?,?,?)", [$data['nama_obat'], $data['id_tipe'], $data['stock_obat'], $data['foto_obat']])) {
            return redirect('apoteker/data_obat/obat')->with('success', 'Data Obat Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function detail(Obat $obat, string $id)
    {
        $data = [
            'obat' =>  Obat::where('id_obat', $id)->get(),
            'obat' => DB::table('view_tipe')->where('id_obat', $id)->get(),
        ];

        // dd($data);

        return view('obat.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Obat $obat,Tipe $tipe)
    {
        $obatData = Obat::where('id_obat', $id)->first();
        $tipeData = $tipe->all();

        return view('obat.edit', [
            'obat' => $obatData,
            'tipeObat' => $tipeData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Obat $obat)
    {
        $id_obat = $request->input('id_obat');

        $data = $request->validate([
            'nama_obat' => 'required',
            'id_tipe' => 'required',
            'stock_obat' => 'required',
            'foto_obat' => 'sometimes|file',
        ]);

        if ($id_obat !== null) {
            if ($request->hasFile('foto_obat')) {
                $foto_file = $request->file('foto_obat');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = base64_encode($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $obat->where('id_obat', $id_obat)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_obat'] = $foto_nama;
            }
            DB::beginTransaction();
                try {
                    $dataUpdate = $obat->where('id_obat', $id_obat)->update($data);
                    DB::commit();
                    return redirect('apoteker/data_obat/obat')->with('success', 'Data Berhasil Diupdate');

                } catch (Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
                }


            if ($dataUpdate) {
                return redirect('apoteker/data_obat/obat')->with('success', 'Data obat berhasil diupdate');
            }
            else{
                return back()->with('error', 'Data obat gagal diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat, Request $request)
    {
        $id_obat = $request->input('id_obat');
        $data = Obat::find($id_obat);

      
        $filePath = public_path('foto') . '/' . $data->file;

        if ($filePath) {
            $data->delete();
            return response()->json(['success' => true]);
        }else {
            return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
        }

        
    }
    public function unduh(Obat $obat)
    {
                   
    
        // Membaca file gambar dan mengonversi ke base64
        $data = $obat->join('tipe', 'obat.id_tipe', '=', 'tipe.id_tipe')->get();
        // $imagePath = public_path('img/logo.PNG');
        // $base64Image = base64_encode(File::get($imagePath)); 
        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('obat.cetak', ['obat' => $obat, 'base64Image' => $base64Image ]);

        // return $pdf->stream('data-obat.pdf');
        $imageDataArray = [];

        foreach ($data as $obat) {
            if ($obat->file) {
                $imageData = base64_encode(file_get_contents(public_path('foto') . '/' . $obat->file));
                $imageSrc = 'data:image/' . pathinfo($obat->file, PATHINFO_EXTENSION) . ';base64,' . $imageData;

                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'awok'];
            }
        }

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('obat.cetak', ['obat' => $data, 'imageDataArray' => $imageDataArray]);
        return $pdf->stream('data-obat.pdf');
    }
}
