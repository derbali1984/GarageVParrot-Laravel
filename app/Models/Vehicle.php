<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand', 'model', 'fiscalPower', 'equipment',
        'price', 'releaseYear', 'energy', 'mileage',
        'gearbox', 'description', 'image'
    ];
}
