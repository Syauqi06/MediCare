<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Pasien;
=======
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
use Illuminate\Http\Request;

class PasienController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
=======
    // protected $userModel;
    // public function __construct()
    // {
        
    // }
    public function index()
    {
        
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(Pasien $pasien)
=======
    public function show(string $id)
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(Pasien $pasien)
=======
    public function edit(string $id)
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, Pasien $pasien)
=======
    public function update(Request $request, string $id)
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Pasien $pasien)
=======
    public function destroy(string $id)
>>>>>>> 0cf4ee527a4e765a3d077ab90d15348945d2c51a
    {
        //
    }
}
