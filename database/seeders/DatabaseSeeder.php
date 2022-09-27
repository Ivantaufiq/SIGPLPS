<?php

namespace Database\Seeders;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 1',
            'npsn' => '284932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'status' => 'Negeri',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 2',
            'npsn' => '232532932',
            'alamat' => 'JL. Martadinata',
            'kecamatan' => 'Pontianak Barat',
            'kelurahan' => 'Sungai Beliung',
            'status' => 'Swasta',
            'jumlah_siswa' => '290',
            'jumlah_guru' => '43',
            'jumlah_kelas' => '26',
            'latitude' => '23426453.23532',
            'longitude' => '32454754654.345433',
        ]);
    }
}
