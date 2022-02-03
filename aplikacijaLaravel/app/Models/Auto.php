<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'motor',
        'godiste'
    ];

    public function proizvodjac(){
        return $this->belongsTo(Proizvodjac::class);
    }
 
    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
