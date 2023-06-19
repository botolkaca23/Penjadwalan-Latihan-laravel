<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class proses_login extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username', '');
        $password = md5($request->input('password', ''));

        if (!empty($request->input('submit_validate'))) {
            $query = DB::table('tb_user')->where('username', $username)->where('password', $password)->first();

            if ($query) {
                Session::put('username_decafe', $username);
                Session::put('level_decafe', $query->level);
                Session::put('id_decafe', $query->id);
                return redirect('/home');
            } else {
                return redirect('/login')->with('error', 'Username atau password yang Anda masukkan salah');
            }
        }
    }
}
