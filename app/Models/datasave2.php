<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasave2 extends Model
{
    use HasFactory;
    protected $table = 'save_data2';
    protected $primaryKey ='id';
    protected $fillable = ['distance','placename'];
}
