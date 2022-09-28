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
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '2846454932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMK 2',
            'jenis_sekolah' => 'SMK',
            'status' => 'Swasta',
            'npsn' => '232523432932',
            'alamat' => 'JL. Martadinata',
            'kecamatan' => 'Pontianak Barat',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '290',
            'jumlah_guru' => '43',
            'jumlah_kelas' => '26',
            'latitude' => '23426453.23532',
            'longitude' => '32454754654.345433',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 4',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '284954632',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 5',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '283244932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 6',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '2849542332',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 7',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '2845432932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 10',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '284456932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMA 4',
            'jenis_sekolah' => 'SMA',
            'status' => 'Negeri',
            'npsn' => '28544932',
            'alamat' => 'JL. A. YANI PONTIANAK',
            'kecamatan' => 'Pontianak Kota',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '324',
            'jumlah_guru' => '50',
            'jumlah_kelas' => '30',
            'latitude' => '324798273294.53285',
            'longitude' => '2833253u.28321',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMK 5',
            'jenis_sekolah' => 'SMK',
            'status' => 'Swasta',
            'npsn' => '23241532932',
            'alamat' => 'JL. Martadinata',
            'kecamatan' => 'Pontianak Barat',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '290',
            'jumlah_guru' => '43',
            'jumlah_kelas' => '26',
            'latitude' => '23426453.23532',
            'longitude' => '32454754654.345433',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMK 7',
            'jenis_sekolah' => 'SMK',
            'status' => 'Swasta',
            'npsn' => '23232932',
            'alamat' => 'JL. Martadinata',
            'kecamatan' => 'Pontianak Barat',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '290',
            'jumlah_guru' => '43',
            'jumlah_kelas' => '26',
            'latitude' => '23426453.23532',
            'longitude' => '32454754654.345433',
        ]);

        Profil::create([
            'nama_sekolah' => 'SMK 8',
            'jenis_sekolah' => 'SMK',
            'status' => 'Swasta',
            'npsn' => '232253322932',
            'alamat' => 'JL. Martadinata',
            'kecamatan' => 'Pontianak Barat',
            'kelurahan' => 'Sungai Beliung',
            'jumlah_siswa' => '290',
            'jumlah_guru' => '43',
            'jumlah_kelas' => '26',
            'latitude' => '23426453.23532',
            'longitude' => '32454754654.345433',
        ]);
    }
}
