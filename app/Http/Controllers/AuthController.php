<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $postData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $credentials = [
            'username' => $postData['username'],
            'password' => $postData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->peran == 'resepsionis' || $user->peran == 'apoteker' || $user->peran == 'asisten_dokter' || $user->peran == 'pasien' || $user->peran == 'admin') {
                return redirect('daftar/poli')->with('_token', Session::token());
            } 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->peran == ['resepsionis', 'apoteker', 'asisten_dokter','pasien','admin']) {
                return response([
                    'success' => true,
                    'redirect_url' => 'daftar/poli',
                    'pesan' => 'login berhasil'
                ], 200);
            } else {
                return response([
                    'success' => true,
                    'redirect_url' => 'login',
                    'pesan' => 'Anda Bukan Admin'
                ], 200);
            }
        } else {
            return response([
                'success' => false
            ], 401);
        }
        
    }}
public function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}