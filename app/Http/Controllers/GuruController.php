<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function profile($id)
    {
        $guru = \App\Guru::find($id);
        return view('master/guru/profile', ['guru' => $guru]);
    }
}
