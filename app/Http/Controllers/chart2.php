<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datasave2;
use App\Models\graponly2;

class chart2 extends Controller
{
    public function graph2()
    {
        $data = graponly2::select('distance', 'created_at')->get();
        
        $chartData = [];

        foreach ($data as $val) {
            $chartData[] = [
                'Created_at' => $val->created_at->toDateTimeString(),
                'Distance' => $val->distance,
            ];
        }
        
        return view('user.graph2', compact('chartData'));
    }
}
