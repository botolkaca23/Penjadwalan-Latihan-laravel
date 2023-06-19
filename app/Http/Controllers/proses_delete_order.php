<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_delete_order extends Controller
{
    public function deleteOrder(Request $request)
    {
        $kode_order = $request->input('kode_order', '');

        if (!empty($request->input('delete_order_validate'))) {
            $select = DB::table('tb_list_order')->where('kode_order', $kode_order)->count();
            if ($select > 0) {
                $message = '<script>alert("Order telah memiliki item order, data ini tidak dapat dihapus ");
                    window.location="../order"</script>';
            } else {
                $query = DB::table('tb_order')->where('id_order', $kode_order)->delete();
                if ($query) {
                    $message = '<script>alert("Data Berhasil Di Hapus");
                        window.location="../order"</script>';
                } else {
                    $message = '<script>alert("Data Gagal Di Hapus");
                        window.location="../order"</script>';
                }
            }
        }

        return $message ?? '';
    }
}
