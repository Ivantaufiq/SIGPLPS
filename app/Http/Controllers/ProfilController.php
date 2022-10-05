<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected $fillable = ['nama_sekolah',
                            'jenis_sekolah',
                            'status',
                            'npsn',
                            'alamat',
                            'kecamatan',
                            'kelurahan',
                            'jumlah_siswa',
                            'jumlah_guru',
                            'jumlah_kelas',
                            'latitude',
                            'longitude'];
}
