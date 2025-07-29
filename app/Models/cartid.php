<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartid extends Model
{
    use HasFactory;
    protected $table = 'cartid';
    protected $filtable = 'c_id';
}
