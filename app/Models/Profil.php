<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = ['nama_sekolah',
                            'jenis_sekolah',
                            'status',
                            'npsn',
                            'akreditasi',
                            'alamat',
                            'kecamatan',
                            'kelurahan',
                            'jumlah_siswa',
                            'jumlah_guru',
                            'jumlah_kelas',
                            'jurusan',
                            'latitude',
                            'longitude'];
    
}
