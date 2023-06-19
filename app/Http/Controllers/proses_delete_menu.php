<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class proses_delete_menu extends Controller
{
    public function deleteMenu(Request $request)
    {
        $id = $request->input('id', '');
        $foto = $request->input('foto', '');

        if (!empty($request->input('input_user_validate'))) {
            $query = DB::table('tb_daftar_menu')->where('id', $id)->delete();
            if ($query) {
                Storage::delete("assets/img/$foto");
                $message = '<script>alert("Data Berhasil Di Hapus");
                    window.location="../menu"</script>';
            } else {
                $message = '<script>alert("Data Gagal Di Hapus");
                    window.location="../menu"</script>';
            }
        }

        return $message ?? '';
    }
}
