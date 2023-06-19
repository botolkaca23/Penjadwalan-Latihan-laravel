<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_delete_katmenu extends Controller
{
    public function deleteKategori(Request $request)
    {
        $id = $request->input('id', '');

        if (!empty($request->input('hapus_kategori_validate'))) {
            $select = DB::table('tb_daftar_menu')->where('kategori', $id)->count();
            if ($select > 0) {
                $message = '<script>alert("Kategori telah digunakan pada Daftar Menu. Kategori tidak dapat dihapus");
                    window.location="../katmenu"</script>';
            } else {
                $query = DB::table('tb_kategori_menu')->where('id_kat_menu', $id)->delete();
                if ($query) {
                    $message = '<script>alert("Data Berhasil Di Hapus");
                        window.location="../katmenu"</script>';
                } else {
                    $message = '<script>alert("Data Gagal Di Hapus");
                        window.location="../katmenu"</script>';
                }
            }
        }

        return $message ?? '';
    }
}
