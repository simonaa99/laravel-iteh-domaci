<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvodjac extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime',
        'drzava'
    ];

    public function automobili(){
        return $this->hasMany(Auto::class);
    }
}
