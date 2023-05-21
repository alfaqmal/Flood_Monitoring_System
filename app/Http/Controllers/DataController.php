<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;


class DataController extends Controller
{
    public function bacasuhu()
    {
        $sensor = Data::select('*')->get();
        return view('user.bacasuhu', ['nilaisensor'=> $sensor]);

        
    }

    public function bacatempat()
    {
        $sensor = Data::select('*')->get();
        return view('user.bacatempat', ['nilaisensor'=> $sensor]);

        
    }

    public function simpansensor()
    {
        Data::where('id','1')->update(['distance'=>request()->distanceval,'placename' =>request()->placeval]);
        
    }

    
}
