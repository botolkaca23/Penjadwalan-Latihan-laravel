<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_input_order extends Controller
{
    public function insert(Request $request)
    {
        $kode_order = $request->input('kode_order');
        $meja = $request->input('meja');
        $pelanggan = $request->input('pelanggan');
        $catatan = $request->input('catatan');

        $select = DB::table('tb_order')->where('id_order', $kode_order)->first();
        if ($select) {
            return redirect()->back()->with('message', 'Order yang dimasukkan telah ada');
        } else {
            $query = DB::table('tb_order')->insert([
                'id_order' => $kode_order,
                'meja' => $meja,
                'pelanggan' => $pelanggan,
                'catatan' => $catatan,
                'pelayan' => session('id_decafe')
            ]);

            if ($query) {
                return redirect()->to('/?x=orderitem&order='.$kode_order.'&meja='.$meja.'&pelanggan='.$pelanggan)->with('message', 'Data Berhasil Di Tambah');
            } else {
                return redirect()->back()->with('message', 'Data Gagal dimasukkan');
            }
        }
    }
}
