<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buah extends Model
{
    //

    protected $table = 'buah';
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // primary key
    protected $primaryKey = 'idBuah';
    // mass-assignment
    protected $fillable = [
        'buah'
    ];
}
