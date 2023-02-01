<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smer extends Model
{
    use HasFactory;

    protected $fillable = ['nazivSmera', 'fakultetID'];

    protected $table = 'smerovi';
}
