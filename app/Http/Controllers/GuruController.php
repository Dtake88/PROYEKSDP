<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{

    public function toHome()
    {
        return view("guru.index");
    }

    public function pindahInputNilai()
    {
       return view("guru.inputNilai");
    }


}
