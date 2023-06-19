<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_input_katmenu extends Controller
{
    public function insert(Request $request)
    {
        $jenismenu = $request->input('jenismenu');
        $katmenu = $request->input('katmenu');

        // Lakukan validasi input jika diperlukan

        $select = DB::table('tb_kategori_menu')->where('kategori_menu', $katmenu)->first();
        if ($select) {
            return redirect()->back()->with('message', 'Kategori yang dimasukkan telah ada');
        } else {
            $query = DB::table('tb_kategori_menu')->insert([
                'jenis_menu' => $jenismenu,
                'kategori_menu' => $katmenu
            ]);

            if ($query) {
                return redirect()->back()->with('message', 'Data Berhasil Di Tambah');
            } else {
                return redirect()->back()->with('message', 'Data Gagal dimasukkan');
            }
        }
    }
}
