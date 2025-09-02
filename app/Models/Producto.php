<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table= 'celulares';
    public $fillable = [
        'marca',
        'modelo',
        'ram_gb',
        'precio'
    ];
}
