<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevUsers extends Model
{
    use HasFactory;
    protected $fillable = ['nome','funcao'];
}
