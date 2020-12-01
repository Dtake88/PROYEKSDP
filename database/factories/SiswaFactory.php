<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\jurusan;
use App\kelas;
use App\Model;
use App\siswa;
use Faker\Generator as Faker;

$factory->define(siswa::class, function (Faker $faker) {
    return [
        "Nama_siswa"=>$faker->name(),
        "Password_siswa" => siswa::latest("NIS")->first()->NIS+1,
        "Tempat_lahir_siswa"=>$faker->citySuffix(),
        "Tanggal_lahir_siswa"=>$faker->dateTimeBetween("-18 years","-17 years"),
        "Nama_ibu"=>$faker->firstNameFemale,
        "Nama_ayah"=>$faker->firstNameMale,
        "NISN"=>$faker->randomNumber($nbDigits = NULL, $strict = false),
        "Agama"=>$faker->randomElement(["Kristen","Khatolik","Islam","Buddha","Hindu"]),
        "Jenis_kelamin"=>$faker->randomElement(["wanita","pria"]),
        "Alamat_siswa"=>$faker->citySuffix(),
        "Status"=>1,
        "id_kelas" => $faker->randomElement(kelas::all()->pluck("Id_kelas")), // dari kelas
        "id_jurusan" => $faker->randomElement(jurusan::all()->pluck("Id_jurusan")) // juruan



    ];
});
