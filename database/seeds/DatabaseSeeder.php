<?php

use App\administrasi;
use App\jurusan;
use App\periode_akademik;
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
        administrasi::create([
            "Nama_administrasi"=>"AdminDede",
            "Username_administrasi"=>"dede1",
            "No_administrasi"=>"082264551111",
            "Alamat_administrasi"=>"Surabaya",
            "Password_admin"=>"dede1"
        ]);

        jurusan::create([
            "Nama_jurusan"=>"IPA"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"IPS"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"Bahasa"
        ]);
        jurusan::create([
            "Nama_jurusan"=>"Umum"
        ]);

        periode_akademik::create([
            "Tahun_ajaran"=>"2004",
            "Semester"=>1,
            "Status"=>1
        ]);

        $this->call([
            GuruSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class
        ]);
    }
}
