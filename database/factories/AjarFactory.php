<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ajar_mengajar;
use App\guru;
use App\kelas;
use App\mapel;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ajar_mengajar::class, function (Faker $faker) {
    return [
        'Id_kelas'=>$faker->randomElement(kelas::all()->pluck("Id_kelas")),
        'Id_mapel'=>$faker->randomElement(mapel::all()->pluck("Id_mapel")),
        'NIG'=>$faker->randomElement(guru::all()->pluck("NIG")),
        'Jam_berakhir'=>$faker,
        'Jam_dimulai',
        'hari',
        'jam_belajar',
        'Status_jadwal'
    ];
});
