<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospitals extends Model
{
    protected $table ='hospitals';
    public $timestamps=false;

    use HasFactory;
}
