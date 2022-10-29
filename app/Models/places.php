<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class places extends Model
{
    protected $table ='places_to_visit';
    public $timestamps=false;

    use HasFactory;
}
