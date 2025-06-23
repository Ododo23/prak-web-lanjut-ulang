<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan halaman profil dengan parameter dari URL
    public function profile($nama = null, $kelas = null, $npm = null)
    {
        // Validasi sederhana jika ingin data wajib diisi
        if (!$nama || !$kelas || !$npm) {
            return redirect('/')->with('error', 'Data profil tidak lengkap.');
        }

        // Kirim data ke view
        return view('profile', [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm'  => $npm,
        ]);
    }
}
