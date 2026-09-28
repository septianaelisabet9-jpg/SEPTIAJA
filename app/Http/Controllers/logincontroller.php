<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Databases;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function aksilogin(Request $request)
    {
        $username = $request->input('u');
        $password = $request->input('p');

        $where = [
            'name' => $username,
            'password' => $password
        ];

        $jalur = new Databases();
        $hasilcek = $jalur->pull('users', $where);

        if ($hasilcek) {
            session(['u' => $hasilcek->name]);
            return redirect('/home');
        } else {
            return redirect('/')->with('error', 'Username atau password salah!');
        }
    }

    public function home(Request $request)
    {
        if (session('u')) {
            $jalur = new Databases();

            // Ambil nilai dari input filter 'from' dan 'to'
            $awal = $request->input('from');
            $akhir = $request->input('to');

            // Cek apakah user mengisi form filter
            if ($awal && $akhir) {
                // Menggunakan fungsi tampilBetween yang ada di model Databases
                $hello['hai'] = $jalur->tampilBetween('users', 'id', $awal, $akhir);
            } else {
                // Jika tidak di-filter, tampilkan semua data seperti biasa
                $hello['hai'] = $jalur->tampil('users');
            }

            // Jika tombol 'Print Excel' diklik
            if ($request->input('export') == 'excel') {
                return response()
                    ->view('excel', $hello)
                    ->header('Content-Type', 'application/vnd.ms-excel')
                    ->header('Content-Disposition', 'attachment; filename="girasya.xls"')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', '0');
            }

            return view('dashboard', $hello);
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function data()
    {
        return view('inputdata');
    }

    public function zano(Request $request)
    {
        $girasya = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed'
        ]);

        unset($girasya['password_confirmation']);

        Databases::create($girasya);
        session(['u' => $girasya['name']]);

        return redirect('/home')->with('success', 'Data berhasil disimpan');
    }
}