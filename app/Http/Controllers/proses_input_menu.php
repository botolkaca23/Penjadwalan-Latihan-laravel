<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class proses_input_menu extends Controller
{
    public function insert(Request $request)
    {
        $nama_menu = $request->input('nama_menu');
        $keterangan = $request->input('keterangan');
        $kat_menu = $request->input('kat_menu');
        $harga = $request->input('harga');
        $stok = $request->input('stok');

        $kode_rand = rand(10000, 99999) . "-";
        $target_dir = "assets/img/" . $kode_rand;
        $target_file = $target_dir . basename($request->file('foto')->getClientOriginalName());
        $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi gambar
        if (!$request->file('foto')->isValid()) {
            return redirect()->back()->with('message', 'Ini bukan file gambar');
        }

        if (file_exists($target_file)) {
            return redirect()->back()->with('message', 'Maaf. File yang Dimasukkan Telah Ada');
        }

        if ($request->file('foto')->getSize() > 500000) {
            return redirect()->back()->with('message', 'File foto yang diupload terlalu besar');
        }

        if (!in_array($imageType, ['jpg', 'jpeg', 'png', 'gif'])) {
            return redirect()->back()->with('message', 'Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, dan GIF');
        }

        // Simpan data ke database
        $select = DB::table('tb_daftar_menu')->where('nama_menu', $nama_menu)->first();
        if ($select) {
            return redirect()->back()->with('message', 'Nama menu yang dimasukkan telah ada');
        } else {
            $request->file('foto')->move($target_dir, $target_file);

            $query = DB::table('tb_daftar_menu')->insert([
                'foto' => $kode_rand . $request->file('foto')->getClientOriginalName(),
                'nama_menu' => $nama_menu,
                'keterangan' => $keterangan,
                'kategori' => $kat_menu,
                'harga' => $harga,
                'stok' => $stok
            ]);

            if ($query) {
                return redirect()->back()->with('message', 'Data Berhasil Di Tambah');
            } else {
                return redirect()->back()->with('message', 'Data gagal Di Tambah');
            }
        }
    }
}
