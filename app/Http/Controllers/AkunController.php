<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akun $akun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akun $akun)
    {
        //
    }
}
