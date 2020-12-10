<?php

use App\administrasi;
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
    }
}
