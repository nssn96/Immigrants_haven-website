<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    protected $table ='user_details';
    public $timestamps=false;

    use HasFactory;
}
