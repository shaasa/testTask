<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BustaPaga extends Model
{
    use HasFactory;

    protected $table = 'dipendenti_bustepaga';
    protected $fillable = [
        'dipendente_id',
        'file',
        'mese',
        'anno',
    ];
}
