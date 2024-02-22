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
/**
     * Controller ini untuk menampung class .
     *
     * @param int|float $a The first number.
     * @param int|float $b The second number.
     * @return int|float The sum of $a and $b.
     */
class ObatController extends Controller
{
    protected $TipeModel;
    public function __construct()
    {
        $this->TipeModel = new Tipe;   
    }
    /**
     * function dibawah ini digunakan untuk memanggil halaman list lalu memanggil storedfunction totalObatnya.
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
     * function dibawah ini digunakan untuk memanggil view tambah dan memanggil datanya.
     */
    public function create(Tipe $tipe)
    {
        $tipeData = $tipe->all();

        return view('obat.tambah', [
            'tipe' => $tipeData,
        ]);
    }

    /**
     * function dibawah ini digunakan untuk mengupdate data
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
     * function dibawah ini digunakan untuk menampilkan detail dan memanggil datanya.
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
     * function edit untuk memanggil view edit dan datanya.
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
     * function dibawah ini untuk mengupdate atau mengedit list data obat.
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
     * function destroy dibawah digunakan untuk menghapus data pada list.
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
    /**
     * Function unduh() dibawah ini digunakan untuk mencetak pdf list data obat.
     */
    
    public function unduh(Obat $obat)
    {
        /**
            * variable imageDataArray untuk membuat array kosong.
        */          
        $imageDataArray = [];
        $obat = $obat->join('tipe', 'obat.id_tipe', '=', 'tipe.id_tipe')->get();
        foreach ($obat as $data) {
            if ($data->foto_obat) {
                /**
                * $imageData berfungsi menghash file foto_obat yang sudah tersimpan pada folder public/foto.
                * function file_get_contents() untuk mengambil konten yang sudah di panggil di function public_path yg bertujuan memanggil file yang digunakan pada foto_obat
                */
                $imageData = base64_encode(file_get_contents(public_path('foto') . '/' . $data->foto_obat));
                /**
                * $imageSrc berfungsi untuk memanggil path yang ada di variable $imageData tadi.
                */
                $imageSrc = 'data:image/' . pathinfo($data->foto_obat, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                /**
                * $imageDataArray untuk mengset tag html src, variable ini untuk mengisi array kosong yang sudah di buat diatas, dan alt yang dimana src memanggil variable imageSrc.
                * alt untuk alternative apabila tag src tidak dapat menangkap data di variable imageSrc.
                */
                
                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'foto'];
            }
        }
                /**
                * $pdf berfungsi memanggil view yang akan digunakan.
                * function setOptions untuk mengsetting pengaturan pdf yang akan ditampilkan.
                * function loadView untuk menampilkan view dan merubah data yg akan digunakan menjadi array.
                */
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('obat.cetak', ['obat' => $obat, 'imageDataArray' => $imageDataArray]);
                /**
                * kode dibawah ini untuk mengreturn variable pdf dan mengatur nama pdf nya nanti mau jadi apa
                * function stream agar tidak langsung di download, melainkan bisa di lihat dulu sebelum di download
                */
        return $pdf->stream('data-obat.pdf');
    }
}
