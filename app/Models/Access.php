<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'lastname',
        'date',
        'time',
        'tower',
        'floor',
        'number_depto',
    ];

    // Scope
    public function scopeDate($query, $date)
    {
        if($date != null || $date != '') {
            $query->where('date', $date);
        }
    }

    public function scopeDni($query, $dni)
    {
        if($dni != null || $dni != '') {
            $query->where('dni', $dni);
        }
    }
}
