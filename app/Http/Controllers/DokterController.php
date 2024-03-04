<?php

namespace App\Http\Controllers;


use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

    //function di bawah ini digunakan untuk memanggil halaman list lalu memanggil storedfunction total dokter.
    public function index() 
    {
        $totalDokter = DB::select('SELECT CountTotalDokter() AS totalDokter')[0]->totalDokter;
        $data = [
            'dokter' => DB::table('view_dokter')->get(),
            'jumlahDokter' => $totalDokter
        ];
        
        return view('dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Poli $poli) // function create untuk data tambah
    {
        $poliData = $poli->all(); // memanggil seluruh data poli

        return view('dokter.tambah', [
            'poli' => $poliData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    //function di bawah ini digunakan untuk mengupdate data
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
            $foto_nama = base64_encode($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_dokter'] = $foto_nama;
        }


        if (DB::statement("CALL CreateDokter(?,?,?,?)", //stored procedur
        [$data['nama_dokter'], 
         $data['id_poli'], 
         $data['no_telp'],
         $data['foto_dokter']]))  { 
            return redirect()->to('asisten/data-dokter/dokter')->with("success", "Data Dokter Berhasil Ditambahkan"); //jika berhasil ditambahkan, akan dialihkan ke data dokter
        }

        return back()->with('error', 'Data Dokter gagal ditambahkan'); //jika gagal, maka akan menampilkan pesan error

    }

    //function di bawah ini digunakan untuk menampilkan detail dan memanggil datanya.
    public function detail(string $id, Dokter $dokter) //untuk melihat detail
    {
        $dokter = Dokter::where('id_dokter', $id)
            ->join('poli', 'dokter.id_poli', '=', 'poli.id_poli') //join data poli pada tabel detail dokter
            ->first();

        return view('dokter.detail', [
            'dokter' => $dokter,
        ]);
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

    //function edit untuk memanggil view edit dan datanya.
    public function edit(string $id, Dokter $dokter, Poli $poli) // function edit untuk mengedit data, di sini datanya adalah data dokter

    {
        $dokter = Dokter::where('id_dokter', $id)->first(); //return the first record found from the database
        $poli = $poli->all(); //mangambil seluruh data poli

        return view('dokter.edit', [
            'dokter' => $dokter,
            'poli' => $poli,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    //function di bawah ini untuk mengupdate atau mengedit data dokter.
    public function update(Request $request, Dokter $dokter) //update berfungsi untuk melihat hasil dari edit, perubahan data akan di handle oleh update
    {
        $id_dokter = $request->input('id_dokter'); //mengakses data input, permintaan HTTP

        $data = $request->validate([ //validasi data yang diinput
            'nama_dokter' => 'sometimes',
            'id_poli' => 'sometimes',
            'no_telp' => 'sometimes',
            'foto_dokter' => 'sometimes',
        ]);

        if ($id_dokter !== null) {
            if ($request->hasFile('foto_dokter')) {
                $foto_file = $request->file('foto_dokter');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = base64_encode($foto_file->getClientOriginalName() . time()) . ' .' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $dokter->where('id_dokter', $id_dokter)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_dokter'] = $foto_nama;
            }

            $dataUpdate = $dokter->where('id_dokter', $id_dokter)->update($data);

            if ($dataUpdate) {
                return redirect('asisten/data-dokter/dokter')->with('success', 'Data berhasil diupdate');
            }
        }

        return back()->with('error', 'Data Gagal diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, Dokter $dokter) //function destroy digunakan untuk menghapus data dokter

    {
        $id_dokter = $request->input('id_dokter');
        $aksi = $dokter->where('id_dokter', $id_dokter)->delete();
        if ($aksi) {
            $pesan = [
                'success' => true,
                'pesan'   => 'Pendaftaran Dokter berhasil dihapus'
            ];
        } else {
            $pesan = [
                'success' => false,
                'pesan'   => 'Pendaftaran Dokter gagal dihapus'
            ];
        }
        return response()->json($pesan);
    }

    //Function unduh() di bawah ini digunakan untuk mencetak pdf data dokter
    public function unduh(Dokter $dokter) //Unduh data dokter dalam bentuk pdf
    {
        $imageDataArray = []; //variable imageDataArray untuk membuat array kosong
        $dokter = $dokter
            ->join('poli', 'dokter.id_poli', '=', 'poli.id_poli') //join poli
            ->get();

        foreach ($dokter as $data) {
            if ($data->foto_dokter) { //memanggil data foto dokter
                // variable imageData berfungsi menghash file foto_dokter yang sudah tersimpan pada folder public/foto.
                $imageData = base64_encode(file_get_contents(public_path('foto') . '/' . $data->foto_dokter));
                //function file_get_contents() untuk mengambil konten yang sudah dipanggil di function public_path yang bertujuan memanggil file yang digunakan pada foto_dokter
                $imageSrc = 'data:image/' . pathinfo($data->foto_dokter, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                //variable imageSrc berfungsi untuk  memanggil path yang ada di variable $imageData

                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'dokter'];
                //variable imageDataArray untuk mengset tag html src, variable ini untuk mengisi array kosong yang sudah di buat di atas, dan alt yang dimana src memanggil variable imageSrc.
                //alt digunakan sebagai alternatif apabila gambar dari variable imageSrc tidak tampil
            }
        }

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('dokter.cetak', ['dokter' => $dokter, 'imageDataArray' => $imageDataArray]); // halaman cetak untuk mencetak data dokter
        return $pdf->stream('dokter.pdf'); //mengatur nama pdf nya, function stream agar tidak langsung di download, melainkan dapat dilihat terlebih dahulu sebelum di download
    }
}
