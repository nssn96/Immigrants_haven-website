<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contributions extends Model
{
    protected $table ='contributions';
    public $timestamps=false;

    use HasFactory;
}
