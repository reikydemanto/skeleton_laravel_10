<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Mahasiswa';

        $mahasiswa = new Mahasiswa();
        $data['mahasiswa'] = $mahasiswa->get_all_mahasiswa();

        return
            view('templates.header', $data) .
            view('dashboard', $data) .
            view('templates.footer');
    }

    public function index_add_edit($nrp = null)
    {
        if($nrp){
            $mahasiswa = new Mahasiswa();
            $data['detail'] = $mahasiswa->get_detail($nrp);
        }
        $data['title'] = 'Tambah/Ubah Mahasiswa';

        return
            view('templates.header', $data) .
            view('add_edit_mahasiswa', $data) .
            view('templates.footer');
    }

    public function add_mahasiswa(Request $req)
    {
        $nrp = $req->input('nrp');
        $name = $req->input('nama');
        $email = $req->input('email');
        $mahasiswa = new Mahasiswa();
        if ($mahasiswa->cek_nrp($nrp) != 0) {
            return redirect()->back()->with('err_msg', 'Maaf NRP Sudah Digunakan');
        }
        if ($mahasiswa->save_mahasiswa($nrp, $name, $email)) {
            return redirect('/dashboard')->with('resp_msg', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('err_msg', 'Maaf ada kesalahan');
        };
    }

    public function edit_mahasiswa(Request $req)
    {
        $nrp = $req->input('nrp');
        $name = $req->input('nama');
        $email = $req->input('email');
        $mahasiswa = new Mahasiswa();
        if ($mahasiswa->edit_mahasiswa($nrp, $name, $email)) {
            return redirect('/dashboard')->with('resp_msg', 'Berhasil mengedit data');
        } else {
            return redirect()->back()->with('err_msg', 'Maaf ada kesalahan');
        };
    }

    public function delete_mahasiswa($nrp)
    {
        $mahasiswa = new Mahasiswa();
        if ($mahasiswa->delete_mahasiswa($nrp)) {
            return redirect('/dashboard')->with('resp_msg', 'Berhasil menghapus data');
        } else {
            return redirect('/dashboard')->with('err_msg', 'Gagal menghapus data');
        };
    }
}
