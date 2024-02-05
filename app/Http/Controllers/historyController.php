<?php

namespace App\Http\Controllers;

use App\Models\logs;
use Illuminate\Http\Request;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_log', 'desc')->get()
        ];

        return view('logs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logs.tambah');
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
    public function show(logs $logs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(logs $logs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, logs $logs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(logs $logs, Request $request)
    {
        $id_log = $request->input('id_log');
        // dd($id_log);

        if ($id_log != null) {
            foreach ($id_log as $id) {
                Logs::where('id_log', $id)->delete();
            }
        }
        return redirect()->to('history/klinik')->with('success', 'Data Berhasil Dihapus');
    
    }
}
