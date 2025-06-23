<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $users = UserModel::with('kelas')->get();
        return view('index_user', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        $kelas = Kelas::all();
        return view('create_user', compact('kelas'));
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'npm' => 'required|string|max:20|unique:user_models,npm',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        UserModel::create($validated);

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit user
    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::all();
        return view('edit_user', compact('user', 'kelas'));
    }

    // Memperbarui data user
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'npm' => 'required|string|max:20|unique:user_models,npm,' . $user->id,
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data user
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus.');
    }
}
