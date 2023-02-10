<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vrsta extends Model
{
    use HasFactory;

    protected $table = 'vrste';

    protected $fillable = ['vrsta','cena'];
}
