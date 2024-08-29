<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;

    public function get_all_mahasiswa()
    {
        return DB::select("
            SELECT * FROM mahasiswa
        ");
    }

    public function get_detail($nrp)
    {
        return DB::select("
            SELECT * FROM mahasiswa WHERE nrp = '" . $nrp . "'
        ");
    }

    public function cek_nrp($nrp)
    {
        return count(DB::select("
            SELECT * FROM mahasiswa WHERE nrp = '" . $nrp . "'
        "));
    }

    public function save_mahasiswa($nrp, $nama, $email)
    {
        return DB::insert('INSERT INTO mahasiswa (nrp, nama, email) VALUES (?, ?, ?)', [$nrp, $nama, $email]);
    }

    public function edit_mahasiswa($nrp, $nama, $email)
    {
        return DB::update('UPDATE mahasiswa SET nama = ? , email = ? WHERE nrp = ?', [$nama, $email, $nrp]);
    }

    public function delete_mahasiswa($nrp)
    {
        return DB::delete('DELETE FROM mahasiswa WHERE nrp = ?',[$nrp]);
    }
}
