<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class proses_edit_user extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $user->level = $request->input('level');
        $user->nohp = $request->input('nohp');
        $user->alamat = $request->input('alamat');

        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data pengguna');
        }
    }

    // ...
}
