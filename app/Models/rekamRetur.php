<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekamRetur extends Model
{
    use HasFactory;

    protected $table = 'rekamRetur';

    protected $fillable = [

        'nip',
        'namaUser',
        'namaBarang',
        'kodeBarang',
        'unit',
        'tipe',
        'debet_retur'


    ];
}
