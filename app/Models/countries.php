<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $table ='countries';
    public $timestamps=false;
    use HasFactory;
}