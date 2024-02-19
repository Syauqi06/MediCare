<?php

namespace App\Http\Controllers;

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
        if (!Auth::check()) {
            return view('auth.login');
        }
        $user = Auth::user(['role']);
        $redirectMap = [
            'apoteker' => 'apoteker/dashboard',
            'resepsionis' => 'resepsionis/dashboard',
            'asisten' => 'asisten/dashboard'
        ];

        if (isset($redirectMap[$user->role])) {
            return redirect($redirectMap[$user->role]);
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user(['role']);
            Session::regenerateToken();
            $redirectMap = [
                'apoteker' => 'apoteker/dashboard',
                'resepsionis' => 'resepsionis/dashboard',
                'asisten' => 'asisten/dashboard'
            ];

            if (isset($redirectMap[$user->role])) {

                return redirect($redirectMap[$user->role]);
            }
            else {
                return response([
                    'success' => false
                ], 401);
            }
        }

        Session::regenerateToken();
        return redirect()->back()->withInput();
        
    }
public function logout()
    {

        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }

}

