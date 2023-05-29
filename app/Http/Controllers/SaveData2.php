<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datasave2;

class SaveData2 extends Controller
{
    public function simpansensor2()
{
    datasave2::create([
        'distance' => request()->valuedistance2,
        'placename' => request()->place2,
    ]);
}
}
