<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data2 extends Model
{
    use HasFactory;
    protected $table = 'sensor_data2';
    protected $primaryKey ='id';
    protected $fillable = ['distance','placename'];
}
