<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_edit_order extends Controller
{
    public function updateOrder(Request $request)
    {
        $kode_order = $request->input('kode_order', '');
        $meja = $request->input('meja', '');
        $pelanggan = $request->input('pelanggan', '');
        $catatan = $request->input('catatan', '');

        if (!empty($request->input('edit_order_validate'))) {
            $query = DB::table('tb_order')->where('id_order', $kode_order)->update([
                'meja' => $meja,
                'pelanggan' => $pelanggan,
                'catatan' => $catatan
            ]);

            if ($query) {
                return redirect('/order')->with('success', 'Data berhasil dimasukkan');
            } else {
                return redirect('/order')->with('error', 'Data gagal dimasukkan');
            }
        }
    }
}
