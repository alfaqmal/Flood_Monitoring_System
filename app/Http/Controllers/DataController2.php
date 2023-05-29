<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data2;

class DataController2 extends Controller
{
    public function bacasuhu2()
    {
        $sensor2 = Data2::select('*')->get();
        return view('user.bacasuhu2', ['nilaisensor2'=> $sensor2]);

        
    }

    public function bacatempat2()
    {
        $sensor2 = Data2::select('*')->get();
        return view('user.bacatempat2', ['nilaisensor2'=> $sensor2]);

        
    }

    public function simpansensor2()
    {
        Data2::where('id','1')->update(['distance'=>request()->distanceval2,'placename' =>request()->placeval2]);
        
    }
}
