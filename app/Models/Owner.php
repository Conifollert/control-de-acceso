<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'fathers_surname',
        'mothers_surname',
        'phone',
        'type_livingplace',
        'number',
    ];
}
