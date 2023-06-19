<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_delete_user extends Controller
{
    public function deleteUser(Request $request)
    {
        $id = $request->input('id', '');

        if (!empty($request->input('input_user_validate'))) {
            $query = DB::table('tb_user')->where('id', $id)->delete();
            if ($query) {
                $message = '<script>alert("Data Berhasil Di Hapus");
                    window.location="../user"</script>';
            } else {
                $message = '<script>alert("Data Gagal Di Hapus");
                    window.location="../user"</script>';
            }
        }

        return $message ?? '';
    }
}
