<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'sensor_data';
    protected $primaryKey ='id';
    protected $fillable = ['distance','placename'];
}
