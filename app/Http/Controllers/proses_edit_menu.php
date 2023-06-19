<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_edit_menu extends Controller
{
    public function updateMenu(Request $request)
    {
        $id = $request->input('id', '');
        $nama_menu = $request->input('nama_menu', '');
        $keterangan = $request->input('keterangan', '');
        $kat_menu = $request->input('kat_menu', '');
        $harga = $request->input('harga', '');
        $stok = $request->input('stok', '');

        $kode_rand = rand(10000, 99999) . "-";
        $target_dir = "../assets/img/" . $kode_rand;
        $target_file = $target_dir . basename($_FILES['foto']['name']);
        $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!empty($request->input('input_menu_validate'))) {
            // Cek apakah gambar atau bukan
            $cek = $request->file('foto')->isValid();
            if (!$cek) {
                $message = "Ini bukan file gambar";
                $statusUpload = 0;
            } else {
                $statusUpload = 1;
                if (file_exists($target_file)) {
                    $message = "Maaf. File yang Dimasukkan Telah Ada";
                    $statusUpload = 0;
                } else {
                    if ($_FILES['foto']['size'] > 500000) { // 500kb
                        $message = "File foto yang di upload terlalu besar";
                        $statusUpload = 0;
                    } else {
                        if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                            $message = "Maaf hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, dan GIF";
                            $statusUpload = 0;
                        }
                    }
                }
            }
            if ($statusUpload == 0) {
                $message = '<script>alert("' . $message . ' Gambar tidak bisa diupload");
                window.location="../menu"</script>';
            } else {
                $select = DB::table('tb_daftar_menu')->where('nama_menu', $nama_menu)->count();
                if ($select > 0) {
                    $message = '<script>alert("Nama menu yang dimasukkan telah ada");
                        window.location="../menu"</script>';
                } else {
                    if ($request->file('foto')->move($target_dir, $_FILES['foto']['name'])) {
                        $query = DB::table('tb_daftar_menu')->where('id', $id)
                            ->update([
                                'foto' => $kode_rand . $_FILES['foto']['name'],
                                'nama_menu' => $nama_menu,
                                'keterangan' => $keterangan,
                                'kategori' => $kat_menu,
                                'harga' => $harga,
                                'stok' => $stok
                            ]);
                        if ($query) {
                            $message = '<script>alert("Data Berhasil Di Tambah");
                                window.location="../menu"</script>';
                        } else {
                            $message = '<script>alert("Data gagal Di Tambah");
                                window.location="../menu"</script>';
                        }
                    } else {
                        $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload");
                                window.location="../menu"</script>';
                    }
                }
            }
        }

        return $message ?? '';
    }
}
