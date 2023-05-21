<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datasave;

class SaveData extends Controller
{
    public function simpansensor()
{
    datasave::create([
        'distance' => request()->valuedistance,
        'placename' => request()->place,
    ]);
}

}
