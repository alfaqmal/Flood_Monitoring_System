<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datasave;
use App\Models\graponly;

class chart extends Controller
{

    public function graph()
    {
        $data = graponly::select('distance', 'created_at')->get();
        
        $chartData = [];

        foreach ($data as $val) {
            $chartData[] = [
                'Created_at' => $val->created_at->toDateTimeString(),
                'Distance' => $val->distance,
            ];
        }
        
        return view('user.graph', compact('chartData'));
    }

}