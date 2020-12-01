<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\kelas;
use App\Model;
use App\riwayat_akademik;
use App\siswa;
use Faker\Generator as Faker;

$factory->define(riwayat_akademik::class, function (Faker $faker) {

    return [
    'NIS'=>$faker->randomElement(siswa::all()->pluck("NIS")),
    'Id_kelas'=>$faker->randomElement(kelas::all()->pluck("Id_kelas")),
    'Id_mapel',
    'Quiz1',
    'Quiz2',
    'Tugas1',
    'Tugas2',
    'UTS',
    'UAS',
    'Sikap',
    'Hasil_akhir'
    ];
});
